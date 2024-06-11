<?php

declare(strict_types=1);

namespace App\Tests\Unit\RequestHandler;

use App\RequestHandler\PingRequestHandler;
use Chubbyphp\Mock\Argument\ArgumentCallback;
use Chubbyphp\Mock\Call;
use Chubbyphp\Mock\MockByCallsTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;

/**
 * @covers \App\RequestHandler\PingRequestHandler
 *
 * @internal
 */
final class PingRequestHandlerTest extends TestCase
{
    use MockByCallsTrait;

    public function testHandle(): void
    {
        /** @var MockObject|ServerRequestInterface $request */
        $request = $this->getMockByCalls(ServerRequestInterface::class);

        $bodyLength = 0;

        /** @var MockObject|StreamInterface $body */
        $body = $this->getMockByCalls(StreamInterface::class, [
            Call::create('write')->with(new ArgumentCallback(static function (string $body) use (&$bodyLength): void {
                $data = json_decode($body, true, 512, JSON_THROW_ON_ERROR);

                self::assertArrayHasKey('datetime', $data);

                $bodyLength = \strlen($body);
            }))->willReturn($bodyLength),
        ]);

        /** @var MockObject|ResponseInterface $response */
        $response = $this->getMockByCalls(ResponseInterface::class, [
            Call::create('withHeader')->with('Content-Type', 'application/json')->willReturnSelf(),
            Call::create('withHeader')
                ->with('Cache-Control', 'no-cache, no-store, must-revalidate')
                ->willReturnSelf(),
            Call::create('withHeader')->with('Pragma', 'no-cache')->willReturnSelf(),
            Call::create('withHeader')->with('Expires', '0')->willReturnSelf(),
            Call::create('getBody')->with()->willReturn($body),
        ]);

        /** @var MockObject|ResponseFactoryInterface $responseFactory */
        $responseFactory = $this->getMockByCalls(ResponseFactoryInterface::class, [
            Call::create('createResponse')->with(200, '')->willReturn($response),
        ]);

        $RequestHandler = new PingRequestHandler($responseFactory);

        self::assertSame($response, $RequestHandler->handle($request));
    }
}
