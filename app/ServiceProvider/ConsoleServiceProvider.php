<?php

declare(strict_types=1);

namespace App\ServiceProvider;

use Chubbyphp\Config\Command\CleanDirectoriesCommand;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

final class ConsoleServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container): void
    {
        $container['console.commands'] = static function () use ($container) {
            return [
                new CleanDirectoriesCommand($container['chubbyphp.config.directories']),
            ];
        };
    }
}
