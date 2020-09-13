<?php

declare(strict_types=1);

use App\Command\CleanDirectoriesCommand;
use App\RequestHandler\PingRequestHandler;
use App\ServiceFactory\Command\CleanDirectoriesCommandFactory;
use App\ServiceFactory\Command\CommandsFactory;
use App\ServiceFactory\Framework\ExceptionMiddlewareFactory;
use App\ServiceFactory\Framework\MiddlewaresFactory;
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
use Psr\Http\Server\MiddlewareInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;

$rootDir = \realpath(__DIR__.'/..');
$cacheDir = $rootDir.'/var/cache/'.$env;
$logDir = $rootDir.'/var/log';

return [
    'debug' => false,
    'dependencies' => [
        'factories' => [
            CleanDirectoriesCommand::class => CleanDirectoriesCommandFactory::class,
            Command::class.'[]' => CommandsFactory::class,
            ExceptionMiddleware::class => ExceptionMiddlewareFactory::class,
            LoggerInterface::class => LoggerFactory::class,
            MiddlewareInterface::class.'[]' => MiddlewaresFactory::class,
            PingRequestHandler::class => PingRequestHandlerFactory::class,
            ResponseFactoryInterface::class => ResponseFactoryFactory::class,
            RouteInterface::class.'[]' => RoutesFactory::class,
            RouterInterface::class => RouterFactory::class,
            RouterMiddleware::class => RouterMiddlewareFactory::class,
        ],
    ],
    'directories' => [
        'cache' => $cacheDir,
        'log' => $logDir,
    ],
    'fastroute' => [
        'cache' => $cacheDir.'/router-cache.php',
    ],
    'monolog' => [
        'name' => 'skeleton',
        'path' => $logDir.'/'.$env.'.log',
        'level' => Logger::NOTICE,
    ],
];
