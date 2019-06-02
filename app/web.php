<?php

declare(strict_types=1);

namespace App;

use App\Controller\PingController;
use App\ServiceProvider\ControllerServiceProvider;
use App\ServiceProvider\HttpFactoryServiceProvider;
use Chubbyphp\Framework\Application;
use Chubbyphp\Framework\ExceptionHandler;
use Chubbyphp\Framework\Middleware\MiddlewareDispatcher;
use Chubbyphp\Framework\RequestHandler\LazyRequestHandler;
use Chubbyphp\Framework\Router\FastRouteRouter;
use Chubbyphp\Framework\Router\Route;
use Pimple\Container;
use Pimple\Psr11\Container as PsrContainer;
use Psr\Http\Message\ResponseFactoryInterface;

require __DIR__.'/bootstrap.php';

/** @var Container */
$container = require __DIR__.'/container.php';
$container->register(new ControllerServiceProvider());
$container->register(new HttpFactoryServiceProvider());

$psrContainer = new PsrContainer($container);

$route = Route::get('/ping', 'ping', new LazyRequestHandler($psrContainer, PingController::class));

$web = new Application(
    new FastRouteRouter([$route], $container['routerCacheFile']),
    new MiddlewareDispatcher(),
    new ExceptionHandler($container[ResponseFactoryInterface::class], $container['debug'])
);

return $web;
