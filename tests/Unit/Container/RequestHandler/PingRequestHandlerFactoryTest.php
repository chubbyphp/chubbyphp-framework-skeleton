<?php

declare(strict_types=1);

namespace App\Tests\Unit\Container\RequestHandler;

use App\Container\RequestHandler\PingRequestHandlerFactory;
use App\RequestHandler\PingRequestHandler;
use Chubbyphp\Mock\Call;
use Chubbyphp\Mock\MockByCallsTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;

/**
 * @covers \App\Container\RequestHandler\PingRequestHandlerFactory
 *
 * @internal
 */
final class PingRequestHandlerFactoryTest extends TestCase
{
    use MockByCallsTrait;

    public function testInvoke(): void
    {
        /** @var ResponseFactoryInterface|MockObject $responseFactory */
        $responseFactory = $this->getMockByCalls(ResponseFactoryInterface::class);

        /** @var ContainerInterface|MockObject $container */
        $container = $this->getMockByCalls(ContainerInterface::class, [
            Call::create('get')->with(ResponseFactoryInterface::class)->willReturn($responseFactory),
        ]);

        $factory = new PingRequestHandlerFactory();

        self::assertInstanceOf(PingRequestHandler::class, $factory($container));
    }
}
