<?php

declare(strict_types=1);

namespace App\RequestHandler;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class PingRequestHandler implements RequestHandlerInterface
{
    public function __construct(private ResponseFactoryInterface $responseFactory) {}

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $response = $this->responseFactory->createResponse()
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->withHeader('Pragma', 'no-cache')
            ->withHeader('Expires', '0')
        ;

        /** @var non-empty-string $body */
        $body = json_encode(['datetime' => date(\DateTime::ATOM)], JSON_THROW_ON_ERROR);

        $response->getBody()->write($body);

        return $response;
    }
}
