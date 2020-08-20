<?php

declare(strict_types=1);

namespace App\ServiceFactory\Doctrine;

use Doctrine\Common\EventManager;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;

final class EntityManagerFactory extends AbstractNamedFactory
{
    public function __invoke(ContainerInterface $container): EntityManagerInterface
    {
        return EntityManager::create(
            $container->get(Connection::class.$this->name),
            $container->get(Configuration::class.$this->name),
            $container->get(EventManager::class.$this->name)
        );
    }
}
