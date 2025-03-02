<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceFactory\Command;

use App\ServiceFactory\Command\CommandsFactory;
use Chubbyphp\CleanDirectories\Command\CleanDirectoriesCommand;
use Chubbyphp\Mock\MockMethod\WithReturn;
use Chubbyphp\Mock\MockObjectBuilder;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @covers \App\ServiceFactory\Command\CommandsFactory
 *
 * @internal
 */
final class CommandsFactoryTest extends TestCase
{
    public function testInvoke(): void
    {
        $builder = new MockObjectBuilder();

        /** @var ContainerInterface $container */
        $container = $builder->create(ContainerInterface::class, [
            new WithReturn('get', ['config'], ['directories' => ['directoryName' => 'directoryPath']]),
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
