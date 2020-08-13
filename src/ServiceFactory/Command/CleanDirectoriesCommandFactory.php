<?php

declare(strict_types=1);

namespace App\ServiceFactory\Command;

use App\Command\CleanDirectoriesCommand;
use Psr\Container\ContainerInterface;

final class CleanDirectoriesCommandFactory
{
    public function __invoke(ContainerInterface $container): CleanDirectoriesCommand
    {
        return new CleanDirectoriesCommand($container->get('config')['directories']);
    }
}
