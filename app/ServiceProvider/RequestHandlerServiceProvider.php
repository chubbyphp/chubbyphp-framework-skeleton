<?php

declare(strict_types=1);

namespace App\ServiceProvider;

use App\RequestHandler\PingRequestHandler;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Psr\Http\Message\ResponseFactoryInterface;

final class RequestHandlerServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container): void
    {
        $container[PingRequestHandler::class] = static function () use ($container) {
            return new PingRequestHandler($container[ResponseFactoryInterface::class]);
        };
    }
}
