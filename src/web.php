<?php

declare(strict_types=1);

namespace App;

use Chubbyphp\Framework\Application;
use Chubbyphp\Framework\ErrorHandler;
use Chubbyphp\Framework\Middleware\ExceptionMiddleware;
use Chubbyphp\Framework\Middleware\LazyMiddleware;
use Chubbyphp\Framework\Middleware\RouterMiddleware;
use Psr\Container\ContainerInterface;

require __DIR__.'/../vendor/autoload.php';

return static function (string $env) {
    set_error_handler([new ErrorHandler(), 'errorToException']);

    /** @var ContainerInterface $container */
    $container = (require __DIR__.'/container.php')($env);

    return new Application([
        new LazyMiddleware($container, ExceptionMiddleware::class),
        new LazyMiddleware($container, RouterMiddleware::class),
    ]);
};
