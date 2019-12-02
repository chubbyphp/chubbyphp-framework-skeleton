<?php

declare(strict_types=1);

namespace App\ServiceFactory;

use App\RequestHandler\PingRequestHandler;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;

final class RequestHandlerServiceFactory
{
    /**
     * @return array<string, callable>
     */
    public function __invoke(): array
    {
        return [
            PingRequestHandler::class => static function (ContainerInterface $container) {
                return new PingRequestHandler($container->get(ResponseFactoryInterface::class));
            },
        ];
    }
}
