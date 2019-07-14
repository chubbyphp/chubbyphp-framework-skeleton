<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class PingController implements RequestHandlerInterface
{
    /**
     * @var ResponseFactoryInterface
     */
    private $responseFactory;

    /**
     * @param ResponseFactoryInterface $responseFactory
     */
    public function __construct(ResponseFactoryInterface $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    /**
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $response = $this->responseFactory->createResponse()
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Cache-Control', 'no-cache, no-store, must-revalidate')
            ->withHeader('Pragma', 'no-cache')
            ->withHeader('Expires', '0')
        ;

        /** @var string $body */
        $body = json_encode(['datetime' => date(\DateTime::ATOM)]);

        $response->getBody()->write($body);

        return $response;
    }
}
