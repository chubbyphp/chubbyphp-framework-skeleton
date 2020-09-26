<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceFactory\Command;

use App\ServiceFactory\Command\CommandsFactory;
use Chubbyphp\CleanDirectories\Command\CleanDirectoriesCommand;
use Chubbyphp\Mock\Call;
use Chubbyphp\Mock\MockByCallsTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @covers \App\ServiceFactory\Command\CommandsFactory
 *
 * @internal
 */
final class CommandsFactoryTest extends TestCase
{
    use MockByCallsTrait;

    public function testInvoke(): void
    {
        /** @var ContainerInterface|MockObject $container */
        $container = $this->getMockByCalls(ContainerInterface::class, [
            Call::create('get')->with('config')->willReturn(['directories' => ['directoryName' => 'directoryPath']]),
        ]);

        $factory = new CommandsFactory();

        $commands = $factory($container);

        self::assertIsArray($commands);

        self::assertCount(1, $commands);

        /** @var CleanDirectoriesCommand $cleanDirectoriesCommand */
        $cleanDirectoriesCommand = array_shift($commands);

        self::assertInstanceOf(CleanDirectoriesCommand::class, $cleanDirectoriesCommand);
    }
}
