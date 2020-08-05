<?php

declare(strict_types=1);

use App\Command\CleanDirectoriesCommand;
use App\RequestHandler\PingRequestHandler;
use App\ServiceFactory\Command\CleanDirectoriesCommandFactory;
use App\ServiceFactory\Framework\ExceptionMiddlewareFactory;
use App\ServiceFactory\Framework\RouterFactory;
use App\ServiceFactory\Framework\RouterMiddlewareFactory;
use App\ServiceFactory\Framework\RoutesFactory;
use App\ServiceFactory\Http\ResponseFactoryFactory;
use App\ServiceFactory\RequestHandler\PingRequestHandlerFactory;
use Chubbyphp\Framework\Middleware\ExceptionMiddleware;
use Chubbyphp\Framework\Middleware\RouterMiddleware;
use Chubbyphp\Framework\Router\RouterInterface;
use Psr\Http\Message\ResponseFactoryInterface;

$rootDir  = \realpath(__DIR__ . '/..');
$cacheDir = $rootDir . '/var/cache/' . $env;

return [
    'cacheDir' => $cacheDir,
    'directories' => [
        'cache' => $cacheDir,
    ],
    'debug' => false,
    'dependencies' => [
        'factories' => [
            'routes' => RoutesFactory::class,
            CleanDirectoriesCommand::class => CleanDirectoriesCommandFactory::class,
            ExceptionMiddleware::class => ExceptionMiddlewareFactory::class,
            PingRequestHandler::class => PingRequestHandlerFactory::class,
            ResponseFactoryInterface::class => ResponseFactoryFactory::class,
            RouterInterface::class => RouterFactory::class,
            RouterMiddleware::class => RouterMiddlewareFactory::class,
        ],
    ],
    'routerCacheFile' => $cacheDir . '/router-cache.php',
];
