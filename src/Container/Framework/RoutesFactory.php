<?php

declare(strict_types=1);

namespace App\Container\Framework;

use App\RequestHandler\PingRequestHandler;
use Chubbyphp\Framework\RequestHandler\LazyRequestHandler;
use Chubbyphp\Framework\Router\Route;
use Chubbyphp\Framework\Router\RouteInterface;
use Psr\Container\ContainerInterface;

final class RoutesFactory
{
    /**
     * @return array<int, RouteInterface>
     */
    public function __invoke(ContainerInterface $container): array
    {
        return [
            Route::get('/ping', 'ping', new LazyRequestHandler($container, PingRequestHandler::class)),
        ];
    }
}
