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
use App\ServiceFactory\Logger\LoggerFactory;
use App\ServiceFactory\RequestHandler\PingRequestHandlerFactory;
use Chubbyphp\Framework\Middleware\ExceptionMiddleware;
use Chubbyphp\Framework\Middleware\RouterMiddleware;
use Chubbyphp\Framework\Router\RouteInterface;
use Chubbyphp\Framework\Router\RouterInterface;
use Monolog\Logger;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Log\LoggerInterface;

$rootDir = \realpath(__DIR__.'/..');
$cacheDir = $rootDir.'/var/cache/'.$env;
$logDir = $rootDir.'/var/log';

return [
    'cacheDir' => $cacheDir,
    'directories' => [
        'cache' => $cacheDir,
        'log' => $logDir,
    ],
    'debug' => false,
    'dependencies' => [
        'factories' => [
            RouteInterface::class.'[]' => RoutesFactory::class,
            CleanDirectoriesCommand::class => CleanDirectoriesCommandFactory::class,
            ExceptionMiddleware::class => ExceptionMiddlewareFactory::class,
            LoggerInterface::class => LoggerFactory::class,
            PingRequestHandler::class => PingRequestHandlerFactory::class,
            ResponseFactoryInterface::class => ResponseFactoryFactory::class,
            RouterInterface::class => RouterFactory::class,
            RouterMiddleware::class => RouterMiddlewareFactory::class,
        ],
    ],
    'monolog' => [
        'name' => 'skeleton',
        'path' => $logDir.'/'.$env.'.log',
        'level' => Logger::NOTICE,
    ],
    'routerCacheFile' => $cacheDir.'/router-cache.php',
];
