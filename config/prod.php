<?php

declare(strict_types=1);

use App\Command\CleanDirectoriesCommand;
use App\RequestHandler\PingRequestHandler;
use App\ServiceFactory\Command\CleanDirectoriesCommandFactory;
use App\ServiceFactory\Command\CommandsFactory;
use App\ServiceFactory\Doctrine\ApcuCacheFactory;
use App\ServiceFactory\Doctrine\ClassMapDriverFactory;
use App\ServiceFactory\Doctrine\ConnectionFactory;
use App\ServiceFactory\Doctrine\DbalConfigurationFactory;
use App\ServiceFactory\Doctrine\EntityManagerFactory;
use App\ServiceFactory\Doctrine\EventManagerFactory;
use App\ServiceFactory\Doctrine\OrmConfigurationFactory;
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
use Doctrine\Common\Cache\CacheProvider;
use Doctrine\Common\EventManager;
use Doctrine\DBAL\Configuration as DbalConfiguration;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\Configuration as OrmConfiguration;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\Mapping\Driver\MappingDriver;
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
            CacheProvider::class => ApcuCacheFactory::class,
            CleanDirectoriesCommand::class => CleanDirectoriesCommandFactory::class,
            Command::class.'[]' => CommandsFactory::class,
            Connection::class => ConnectionFactory::class,
            DbalConfiguration::class => DbalConfigurationFactory::class,
            EntityManager::class => EntityManagerFactory::class,
            EventManager::class => EventManagerFactory::class,
            ExceptionMiddleware::class => ExceptionMiddlewareFactory::class,
            LoggerInterface::class => LoggerFactory::class,
            MappingDriver::class => ClassMapDriverFactory::class,
            MiddlewareInterface::class.'[]' => MiddlewaresFactory::class,
            OrmConfiguration::class => OrmConfigurationFactory::class,
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
    'doctrine' => [
        'dbal' => [
            'connection' => [
                'driver' => 'pdo_pgsql',
                'charset' => 'utf8',
                'user' => 'root',
                'password' => 'root',
                'host' => 'localhost',
                'port' => 15432,
                'dbname' => 'skeleton',
            ],
            'configuration' => [
                'resultCacheImpl' => CacheProvider::class,
            ],
        ],
        'orm' => [
            'configuration' => [
                'metadataDriverImpl' => MappingDriver::class,
                'proxyDir' => $cacheDir.'/doctrine/orm/proxies',
                'proxyNamespace' => 'DoctrineProxy',
                'hydrationCacheImpl' => CacheProvider::class,
                'metadataCacheImpl' => CacheProvider::class,
                'queryCacheImpl' => CacheProvider::class,
                'resultCacheImpl' => CacheProvider::class,
            ],
        ],
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
