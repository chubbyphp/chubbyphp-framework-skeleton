<?php

declare(strict_types=1);

namespace App\ServiceFactory;

use App\RequestHandler\PingRequestHandler;
use Chubbyphp\Framework\Middleware\ExceptionMiddleware;
use Chubbyphp\Framework\Middleware\RouterMiddleware;
use Chubbyphp\Framework\RequestHandler\LazyRequestHandler;
use Chubbyphp\Framework\Router\FastRouteRouter;
use Chubbyphp\Framework\Router\Route;
use Chubbyphp\Framework\Router\RouterInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;

final class ChubbyphpFrameworkServiceFactory
{
    /**
     * @return array<string, callable>
     */
    public function __invoke(): array
    {
        return [
            ExceptionMiddleware::class => static function (ContainerInterface $container) {
                return new ExceptionMiddleware(
                    $container->get(ResponseFactoryInterface::class),
                    $container->get('debug')
                );
            },
            RouterMiddleware::class => static function (ContainerInterface $container) {
                return new RouterMiddleware(
                    $container->get(RouterInterface::class),
                    $container->get(ResponseFactoryInterface::class)
                );
            },
            RouterInterface::class => static function (ContainerInterface $container) {
                return new FastRouteRouter($container->get('routes'), $container->get('routerCacheFile'));
            },
            'routes' => static function (ContainerInterface $container) {
                return [Route::get('/ping', 'ping', new LazyRequestHandler($container, PingRequestHandler::class))];
            },
        ];
    }
}
