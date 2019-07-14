<?php

declare(strict_types=1);

namespace App\ServiceProvider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Zend\Diactoros\ResponseFactory;

final class HttpFactoryServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $container
     */
    public function register(Container $container): void
    {
        $container[ResponseFactoryInterface::class] = function () {
            return new ResponseFactory();
        };
    }
}
