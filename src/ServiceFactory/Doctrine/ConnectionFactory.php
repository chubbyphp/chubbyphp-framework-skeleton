<?php

declare(strict_types=1);

namespace App\ServiceFactory\Doctrine;

use Doctrine\Common\EventManager;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Psr\Container\ContainerInterface;

final class ConnectionFactory extends AbstractNamedFactory
{
    public function __invoke(ContainerInterface $container): Connection
    {
        /** @var array $dbal */
        $dbal = $container->get('config')['doctrine']['dbal'];

        return DriverManager::getConnection(
            '' !== $this->name ? $dbal[$this->name]['connection'] : $dbal['connection'],
            $container->get(Configuration::class.$this->name),
            $container->get(EventManager::class.$this->name)
        );
    }
}
