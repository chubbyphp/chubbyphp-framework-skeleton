<?php

declare(strict_types=1);

namespace App\ServiceFactory\Command;

use Chubbyphp\CleanDirectories\ServiceFactory\CleanDirectoriesCommandFactory;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Command\Command;

final class CommandsFactory
{
    /**
     * @return list<Command>
     */
    public function __invoke(ContainerInterface $container): array
    {
        return [
            (new CleanDirectoriesCommandFactory())($container),
        ];
    }
}
