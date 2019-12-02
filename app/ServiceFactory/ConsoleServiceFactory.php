<?php

declare(strict_types=1);

namespace App\ServiceFactory;

use Chubbyphp\Config\Command\CleanDirectoriesCommand;
use Psr\Container\ContainerInterface;

final class ConsoleServiceFactory
{
    /**
     * @return array<string, callable>
     */
    public function __invoke(): array
    {
        return [
            'console.commands' => static function (ContainerInterface $container) {
                return [
                    new CleanDirectoriesCommand($container->get('chubbyphp.config.directories')),
                ];
            },
        ];
    }
}
