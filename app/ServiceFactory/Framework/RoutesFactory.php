<?php

declare(strict_types=1);

namespace App\ServiceFactory\Framework;

use App\RequestHandler\PingRequestHandler;
use Chubbyphp\Framework\RequestHandler\LazyRequestHandler;
use Chubbyphp\Framework\Router\Route;
use Psr\Container\ContainerInterface;

final class RoutesFactory
{
    /**
     * @return array<int, Route>
     */
    public function __invoke(ContainerInterface $container): array
    {
        return [
            Route::get('/ping', 'ping', new LazyRequestHandler($container, PingRequestHandler::class)),
        ];
    }
}
