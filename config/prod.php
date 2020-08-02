<?php

declare(strict_types=1);

use App\Command\CleanDirectoriesCommand;
use App\RequestHandler\PingRequestHandler;
use App\ServiceFactory\Command\CleanDirectoriesCommandFactory;
use App\ServiceFactory\Framework\ExceptionMiddlewareFactory;
use App\ServiceFactory\Framework\RouterFactory;
use App\ServiceFactory\Framework\RouterMiddlewareFactory;
use App\ServiceFactory\Framework\RoutesFactory;
use App\ServiceFactory\RequestHandler\PingRequestHandlerFactory;
use App\ServiceFactory\ResponseFactoryFactory;
use Chubbyphp\Framework\Middleware\ExceptionMiddleware;
use Chubbyphp\Framework\Middleware\RouterMiddleware;
use Chubbyphp\Framework\Router\RouterInterface;
use Psr\Http\Message\ResponseFactoryInterface;

$rootDir = realpath(__DIR__ .'/..');

$config = [];
$config['cacheDir'] = $rootDir . '/var/cache/' . $env;
$config['directories'] = ['cache' => $config['cacheDir']];
$config['debug'] = false;
$config['dependencies'] = [];
$config['dependencies']['factories'] = [];
$config['dependencies']['factories']['routes'] = RoutesFactory::class;
$config['dependencies']['factories'][CleanDirectoriesCommand::class] = CleanDirectoriesCommandFactory::class;
$config['dependencies']['factories'][ExceptionMiddleware::class] = ExceptionMiddlewareFactory::class;
$config['dependencies']['factories'][PingRequestHandler::class] = PingRequestHandlerFactory::class;
$config['dependencies']['factories'][ResponseFactoryInterface::class] = ResponseFactoryFactory::class;
$config['dependencies']['factories'][RouterInterface::class] = RouterFactory::class;
$config['dependencies']['factories'][RouterMiddleware::class] = RouterMiddlewareFactory::class;
$config['routerCacheFile'] = $config['cacheDir'] . '/router-cache.php';

return $config;
