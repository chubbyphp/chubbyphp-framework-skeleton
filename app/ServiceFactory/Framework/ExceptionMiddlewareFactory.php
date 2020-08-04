<?php

declare(strict_types=1);

namespace App\ServiceFactory\Framework;

use Chubbyphp\Framework\Middleware\ExceptionMiddleware;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;

final class ExceptionMiddlewareFactory
{
    public function __invoke(ContainerInterface $container): ExceptionMiddleware
    {
        return new ExceptionMiddleware(
            $container->get(ResponseFactoryInterface::class),
            $container->get('config')['debug']
        );
    }
}
