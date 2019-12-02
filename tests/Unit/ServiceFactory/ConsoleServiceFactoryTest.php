<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceFactory;

use App\ServiceFactory\ConsoleServiceFactory;
use Chubbyphp\Config\Command\CleanDirectoriesCommand;
use Chubbyphp\Mock\Call;
use Chubbyphp\Mock\MockByCallsTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @covers \App\ServiceFactory\ConsoleServiceFactory
 *
 * @internal
 */
final class ConsoleServiceFactoryTest extends TestCase
{
    use MockByCallsTrait;

    public function testFactories(): void
    {
        $factories = (new ConsoleServiceFactory())();

        self::assertCount(1, $factories);
    }

    public function testConsoleCommands(): void
    {
        /** @var ContainerInterface|MockObject $container */
        $container = $this->getMockByCalls(ContainerInterface::class, [
            Call::create('get')->with('chubbyphp.config.directories')->willReturn([]),
        ]);

        $factories = (new ConsoleServiceFactory())();

        self::assertArrayHasKey('console.commands', $factories);

        $commands = $factories['console.commands']($container);

        self::assertIsArray($commands);

        self::assertCount(1, $commands);

        self::assertInstanceOf(CleanDirectoriesCommand::class, array_shift($commands));
    }
}
