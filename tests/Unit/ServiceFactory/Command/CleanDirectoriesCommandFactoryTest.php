<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceFactory\Command;

use App\Command\CleanDirectoriesCommand;
use App\ServiceFactory\Command\CleanDirectoriesCommandFactory;
use Chubbyphp\Mock\Call;
use Chubbyphp\Mock\MockByCallsTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @covers \App\ServiceFactory\Command\CleanDirectoriesCommandFactory
 *
 * @internal
 */
final class CleanDirectoriesCommandFactoryTest extends TestCase
{
    use MockByCallsTrait;

    public function testInvoke(): void
    {
        $config = [
            'directories' => [],
        ];

        /** @var ContainerInterface|MockObject $container */
        $container = $this->getMockByCalls(ContainerInterface::class, [
            Call::create('get')->with('config')->willReturn($config),
        ]);

        $factory = new CleanDirectoriesCommandFactory();

        self::assertInstanceOf(CleanDirectoriesCommand::class, $factory($container));
    }
}
