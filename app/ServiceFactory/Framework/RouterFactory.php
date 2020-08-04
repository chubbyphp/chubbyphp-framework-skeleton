<?php

declare(strict_types=1);

namespace App\ServiceFactory\Framework;

use Chubbyphp\Framework\Router\FastRoute\Router;
use Psr\Container\ContainerInterface;

final class RouterFactory
{
    public function __invoke(ContainerInterface $container): Router
    {
        return new Router($container->get('routes'), $container->get('config')['routerCacheFile']);
    }
}
