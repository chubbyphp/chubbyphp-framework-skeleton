<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceProvider;

use App\ServiceProvider\ConsoleServiceProvider;
use Chubbyphp\Config\Command\CleanDirectoriesCommand;
use Chubbyphp\Mock\MockByCallsTrait;
use PHPUnit\Framework\TestCase;
use Pimple\Container;

/**
 * @covers \App\ServiceProvider\ConsoleServiceProvider
 *
 * @internal
 */
final class ConsoleServiceProviderTest extends TestCase
{
    use MockByCallsTrait;

    public function testRegister(): void
    {
        $container = new Container([
            'chubbyphp.config.directories' => [
                'cache' => '/path/to/cache',
            ],
        ]);

        $serviceProvider = new ConsoleServiceProvider();
        $serviceProvider->register($container);

        self::assertArrayHasKey('console.commands', $container);

        $commands = $container['console.commands'];

        self::assertCount(1, $commands);

        self::assertInstanceOf(CleanDirectoriesCommand::class, $commands[0]);
    }
}
