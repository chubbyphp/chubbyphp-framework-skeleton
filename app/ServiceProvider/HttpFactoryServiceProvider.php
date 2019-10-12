<?php

declare(strict_types=1);

namespace App\ServiceProvider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Psr7\Factory\ResponseFactory;

final class HttpFactoryServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container): void
    {
        $container[ResponseFactoryInterface::class] = static function () {
            return new ResponseFactory();
        };
    }
}
