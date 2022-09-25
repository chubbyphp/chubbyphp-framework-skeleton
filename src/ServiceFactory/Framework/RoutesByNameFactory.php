<?php

declare(strict_types=1);

namespace App\ServiceFactory\Framework;

use App\RequestHandler\PingRequestHandler;
use Chubbyphp\Framework\RequestHandler\LazyRequestHandler;
use Chubbyphp\Framework\Router\Route;
use Chubbyphp\Framework\Router\RoutesByName;
use Chubbyphp\Framework\Router\RoutesByNameInterface;
use Psr\Container\ContainerInterface;

final class RoutesByNameFactory
{
    public function __invoke(ContainerInterface $container): RoutesByNameInterface
    {
        $r = static fn (string $name) => new LazyRequestHandler($container, $name);

        return new RoutesByName([
            Route::get('/ping', 'ping', $r(PingRequestHandler::class)),
        ]);
    }
}
