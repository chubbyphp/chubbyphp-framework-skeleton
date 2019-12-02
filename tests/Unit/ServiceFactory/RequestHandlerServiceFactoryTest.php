<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceFactory;

use App\RequestHandler\PingRequestHandler;
use App\ServiceFactory\RequestHandlerServiceFactory;
use Chubbyphp\Mock\Call;
use Chubbyphp\Mock\MockByCallsTrait;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;

/**
 * @covers \App\ServiceFactory\RequestHandlerServiceFactory
 *
 * @internal
 */
final class RequestHandlerServiceFactoryTest extends TestCase
{
    use MockByCallsTrait;

    public function testFactories(): void
    {
        $factories = (new RequestHandlerServiceFactory())();

        self::assertCount(1, $factories);
    }

    public function testPingRequestHandler(): void
    {
        /** @var ResponseFactoryInterface|MockObject $responseFactory */
        $responseFactory = $this->getMockByCalls(ResponseFactoryInterface::class);

        /** @var ContainerInterface|MockObject $container */
        $container = $this->getMockByCalls(ContainerInterface::class, [
            Call::create('get')->with(ResponseFactoryInterface::class)->willReturn($responseFactory),
        ]);

        $factories = (new RequestHandlerServiceFactory())();

        self::assertArrayHasKey(PingRequestHandler::class, $factories);

        self::assertInstanceOf(
            PingRequestHandler::class,
            $factories[PingRequestHandler::class]($container)
        );
    }
}
