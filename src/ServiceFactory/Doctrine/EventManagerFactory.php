<?php

declare(strict_types=1);

namespace App\ServiceFactory\Doctrine;

use Doctrine\Common\EventManager;
use Psr\Container\ContainerInterface;

final class EventManagerFactory
{
    public function __invoke(ContainerInterface $container): EventManager
    {
        return new EventManager();
    }
}
