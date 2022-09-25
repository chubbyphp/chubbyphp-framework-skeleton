<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceFactory\Framework;

use App\RequestHandler\PingRequestHandler;
use App\ServiceFactory\Framework\RoutesByNameFactory;
use Chubbyphp\Framework\RequestHandler\LazyRequestHandler;
use Chubbyphp\Framework\Router\Route;
use Chubbyphp\Mock\MockByCallsTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @covers \App\ServiceFactory\Framework\RoutesByNameFactory
 *
 * @internal
 */
final class RoutesFactoryTest extends TestCase
{
    use MockByCallsTrait;

    public function testInvoke(): void
    {
        /** @var ContainerInterface|MockObject $container */
        $container = $this->getMockByCalls(ContainerInterface::class);

        $r = static fn (string $name) => new LazyRequestHandler($container, $name);

        $factory = new RoutesByNameFactory();

        self::assertEquals([
            'ping' => Route::get('/ping', 'ping', $r(PingRequestHandler::class)),
        ], $factory($container)->getRoutesByName());
    }
}
