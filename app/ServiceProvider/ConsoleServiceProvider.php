<?php

declare(strict_types=1);

namespace App\ServiceProvider;

use Chubbyphp\Config\Command\CleanDirectoriesCommand;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

final class ConsoleServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $container
     */
    public function register(Container $container): void
    {
        $container['console.commands'] = function () use ($container) {
            return [
                new CleanDirectoriesCommand($container['chubbyphp.config.directories']),
            ];
        };
    }
}
