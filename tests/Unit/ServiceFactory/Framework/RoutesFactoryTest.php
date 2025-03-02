<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceFactory\Framework;

use App\RequestHandler\PingRequestHandler;
use App\ServiceFactory\Framework\RoutesByNameFactory;
use Chubbyphp\Framework\RequestHandler\LazyRequestHandler;
use Chubbyphp\Framework\Router\Route;
use Chubbyphp\Mock\MockObjectBuilder;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @covers \App\ServiceFactory\Framework\RoutesByNameFactory
 *
 * @internal
 */
final class RoutesFactoryTest extends TestCase
{
    public function testInvoke(): void
    {
        $builder = new MockObjectBuilder();

        /** @var ContainerInterface $container */
        $container = $builder->create(ContainerInterface::class, []);

        $r = static fn (string $name) => new LazyRequestHandler($container, $name);

        $factory = new RoutesByNameFactory();

        self::assertEquals([
            'ping' => Route::get('/ping', 'ping', $r(PingRequestHandler::class)),
        ], $factory($container)->getRoutesByName());
    }
}
