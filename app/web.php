<?php

declare(strict_types=1);

namespace App;

use App\Config\DevConfig;
use App\Config\PhpunitConfig;
use App\Config\ProdConfig;
use App\ServiceFactory\ChubbyphpFrameworkServiceFactory;
use App\ServiceFactory\HttpFactoryServiceFactory;
use App\ServiceFactory\RequestHandlerServiceFactory;
use Chubbyphp\Config\ConfigProvider;
use Chubbyphp\Config\ServiceFactory\ConfigServiceFactory;
use Chubbyphp\Container\Container;
use Chubbyphp\Framework\Application;
use Chubbyphp\Framework\ErrorHandler;
use Chubbyphp\Framework\Middleware\ExceptionMiddleware;
use Chubbyphp\Framework\Middleware\LazyMiddleware;
use Chubbyphp\Framework\Middleware\RouterMiddleware;

require __DIR__.'/../vendor/autoload.php';

return static function (string $env) {
    set_error_handler([new ErrorHandler(), 'errorToException']);

    /** @var Container $container */
    $container = (require __DIR__.'/container.php')();
    $container->factories((new ChubbyphpFrameworkServiceFactory())());
    $container->factories((new HttpFactoryServiceFactory())());
    $container->factories((new RequestHandlerServiceFactory())());

    // always load this service provider last
    // so that the values of other service providers can be overwritten.
    $container->factories((new ConfigServiceFactory((new ConfigProvider([
        new DevConfig(__DIR__.'/..'),
        new PhpunitConfig(__DIR__.'/..'),
        new ProdConfig(__DIR__.'/..'),
    ]))->get($env)))());

    return new Application([
        new LazyMiddleware($container, ExceptionMiddleware::class),
        new LazyMiddleware($container, RouterMiddleware::class),
    ]);
};
