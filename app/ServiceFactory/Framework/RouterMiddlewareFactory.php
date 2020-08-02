<?php

declare(strict_types=1);

namespace App\ServiceFactory\Framework;

use Chubbyphp\Framework\Middleware\RouterMiddleware;
use Chubbyphp\Framework\Router\RouterInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;

final class RouterMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): RouterMiddleware
    {
        return new RouterMiddleware(
            $container->get(RouterInterface::class),
            $container->get(ResponseFactoryInterface::class)
        );
    }
}
