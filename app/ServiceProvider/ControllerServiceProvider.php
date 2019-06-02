<?php

declare(strict_types=1);

namespace App\ServiceProvider;

use App\Controller\PingController;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Psr\Http\Message\ResponseFactoryInterface;

final class ControllerServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $container
     */
    public function register(Container $container)
    {
        $container[PingController::class] = function () use ($container) {
            return new PingController($container[ResponseFactoryInterface::class]);
        };
    }
}
