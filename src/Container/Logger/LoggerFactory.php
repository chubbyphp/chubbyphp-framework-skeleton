<?php

declare(strict_types=1);

namespace App\Container\Logger;

use Monolog\Formatter\LogstashFormatter;
use Monolog\Handler\BufferHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

final class LoggerFactory
{
    public function __invoke(ContainerInterface $container): LoggerInterface
    {
        $config = $container->get('config');

        return new Logger($config['monolog']['name'], [
            new BufferHandler(
                (new StreamHandler(
                    $config['monolog']['path'],
                    $config['monolog']['level']
                ))->setFormatter(new LogstashFormatter('app'))
            ),
        ]);
    }
}
