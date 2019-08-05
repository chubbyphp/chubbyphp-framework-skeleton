<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceProvider;

use App\RequestHandler\PingRequestHandler;
use App\ServiceProvider\RequestHandlerServiceProvider;
use Chubbyphp\Mock\MockByCallsTrait;
use PHPUnit\Framework\TestCase;
use Pimple\Container;
use Psr\Http\Message\ResponseFactoryInterface;

/**
 * @covers \App\ServiceProvider\RequestHandlerServiceProvider
 *
 * @internal
 */
final class RequestHandlerServiceProviderTest extends TestCase
{
    use MockByCallsTrait;

    public function testRegister(): void
    {
        $container = new Container([
            ResponseFactoryInterface::class => $this->getMockByCalls(ResponseFactoryInterface::class),
        ]);

        $serviceProvider = new RequestHandlerServiceProvider();
        $serviceProvider->register($container);

        self::assertInstanceOf(PingRequestHandler::class, $container[PingRequestHandler::class]);
    }
}
