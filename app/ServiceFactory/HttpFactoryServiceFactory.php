<?php

declare(strict_types=1);

namespace App\ServiceFactory;

use Psr\Http\Message\ResponseFactoryInterface;
use Slim\Psr7\Factory\ResponseFactory;

final class HttpFactoryServiceFactory
{
    /**
     * @return array<string, callable>
     */
    public function __invoke(): array
    {
        return [
            ResponseFactoryInterface::class => static function () {
                return new ResponseFactory();
            },
        ];
    }
}
