<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceFactory\Command;

use App\Command\CleanDirectoriesCommand;
use App\ServiceFactory\Command\CommandsFactory;
use Chubbyphp\Mock\Call;
use Chubbyphp\Mock\MockByCallsTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Command\Command;

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
        $cleanDirectoriesCommand = $this->getMockByCalls(Command::class);

        /** @var ContainerInterface|MockObject $container */
        $container = $this->getMockByCalls(ContainerInterface::class, [
            Call::create('get')->with(CleanDirectoriesCommand::class)->willReturn($cleanDirectoriesCommand),
        ]);

        $factory = new CommandsFactory();

        $commands = $factory($container);

        self::assertIsArray($commands);

        self::assertCount(1, $commands);

        self::assertSame($cleanDirectoriesCommand, array_shift($commands));
    }
}
