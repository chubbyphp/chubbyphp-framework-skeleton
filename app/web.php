<?php

declare(strict_types=1);

namespace App;

use App\RequestHandler\PingRequestHandler;
use App\ServiceProvider\HttpFactoryServiceProvider;
use App\ServiceProvider\RequestHandlerServiceProvider;
use Chubbyphp\Framework\Application;
use Chubbyphp\Framework\Middleware\ExceptionMiddleware;
use Chubbyphp\Framework\Middleware\RouterMiddleware;
use Chubbyphp\Framework\RequestHandler\LazyRequestHandler;
use Chubbyphp\Framework\Router\FastRouteRouter;
use Chubbyphp\Framework\Router\Route;
use Pimple\Container;
use Pimple\Psr11\Container as PsrContainer;
use Psr\Http\Message\ResponseFactoryInterface;

require __DIR__.'/bootstrap.php';

/** @var Container $container */
$container = require __DIR__.'/container.php';
$container->register(new RequestHandlerServiceProvider());
$container->register(new HttpFactoryServiceProvider());

$psrContainer = new PsrContainer($container);

$route = Route::get('/ping', 'ping', new LazyRequestHandler($psrContainer, PingRequestHandler::class));

return new Application([
    new ExceptionMiddleware($container[ResponseFactoryInterface::class], $container['debug']),
    new RouterMiddleware(
        new FastRouteRouter([$route], $container['routerCacheFile']),
        $container[ResponseFactoryInterface::class]
    ),
]);
