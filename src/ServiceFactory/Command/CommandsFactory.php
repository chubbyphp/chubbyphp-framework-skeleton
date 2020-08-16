<?php

declare(strict_types=1);

namespace App\ServiceFactory\Command;

use App\Command\CleanDirectoriesCommand;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Command\Command;

final class CommandsFactory
{
    /**
     * @return array<int, Command>
     */
    public function __invoke(ContainerInterface $container): array
    {
        return [
            $container->get(CleanDirectoriesCommand::class),
        ];
    }
}
