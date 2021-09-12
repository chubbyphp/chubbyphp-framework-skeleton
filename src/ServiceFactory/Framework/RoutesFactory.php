<?php

declare(strict_types=1);

namespace App\ServiceFactory\Framework;

use App\RequestHandler\PingRequestHandler;
use Chubbyphp\Framework\RequestHandler\LazyRequestHandler;
use Chubbyphp\Framework\Router\Route;
use Chubbyphp\Framework\Router\Routes;
use Chubbyphp\Framework\Router\RoutesInterface;
use Psr\Container\ContainerInterface;

final class RoutesFactory
{
    public function __invoke(ContainerInterface $container): RoutesInterface
    {
        $r = static fn (string $name) => new LazyRequestHandler($container, $name);

        return new Routes([
            Route::get('/ping', 'ping', $r(PingRequestHandler::class)),
        ]);
    }
}
