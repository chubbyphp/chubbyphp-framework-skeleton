<?php

declare(strict_types=1);

namespace App;

use App\Config\DevConfig;
use App\Config\PhpunitConfig;
use App\Config\ProdConfig;
use App\RequestHandler\PingRequestHandler;
use App\ServiceProvider\HttpFactoryServiceProvider;
use App\ServiceProvider\RequestHandlerServiceProvider;
use Chubbyphp\Config\ConfigProvider;
use Chubbyphp\Config\ServiceProvider\ConfigServiceProvider;
use Chubbyphp\Framework\Application;
use Chubbyphp\Framework\ErrorHandler;
use Chubbyphp\Framework\Middleware\ExceptionMiddleware;
use Chubbyphp\Framework\Middleware\RouterMiddleware;
use Chubbyphp\Framework\RequestHandler\LazyRequestHandler;
use Chubbyphp\Framework\Router\FastRouteRouter;
use Chubbyphp\Framework\Router\Route;
use Pimple\Container;
use Pimple\Psr11\Container as PsrContainer;
use Psr\Http\Message\ResponseFactoryInterface;

require __DIR__.'/../vendor/autoload.php';

return static function (string $env) {
    set_error_handler([new ErrorHandler(), 'errorToException']);

    /** @var Container $container */
    $container = (require __DIR__.'/container.php')($env);
    $container->register(new HttpFactoryServiceProvider());
    $container->register(new RequestHandlerServiceProvider());

    // always load this service provider last
    // so that the values of other service providers can be overwritten.
    $container->register(new ConfigServiceProvider(
        new ConfigProvider([
            new DevConfig(__DIR__.'/..'),
            new PhpunitConfig(__DIR__.'/..'),
            new ProdConfig(__DIR__.'/..'),
        ])
    ));

    $psrContainer = new PsrContainer($container);

    $route = Route::get('/ping', 'ping', new LazyRequestHandler($psrContainer, PingRequestHandler::class));

    return new Application([
        new ExceptionMiddleware($container[ResponseFactoryInterface::class], $container['debug']),
        new RouterMiddleware(
            new FastRouteRouter([$route], $container['routerCacheFile']),
            $container[ResponseFactoryInterface::class]
        ),
    ]);
};
