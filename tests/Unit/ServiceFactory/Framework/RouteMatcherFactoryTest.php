<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceFactory\Framework;

use App\ServiceFactory\Framework\RouteMatcherFactory;
use Chubbyphp\Framework\Router\RouteMatcherInterface;
use Chubbyphp\Framework\Router\RoutesByNameInterface;
use Chubbyphp\Mock\Call;
use Chubbyphp\Mock\MockByCallsTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @covers \App\ServiceFactory\Framework\RouteMatcherFactory
 *
 * @internal
 */
final class RouteMatcherFactoryTest extends TestCase
{
    use MockByCallsTrait;

    public function testInvoke(): void
    {
        $config = [
            'fastroute' => [
                'cache' => sys_get_temp_dir().'/'.uniqid('fastroute-cache-').'.php',
            ],
        ];

        /** @var ContainerInterface|MockObject $routesByName */
        $routesByName = $this->getMockByCalls(RoutesByNameInterface::class, [
            Call::create('getRoutesByName')->with()->willReturn([]),
        ]);

        /** @var ContainerInterface|MockObject $container */
        $container = $this->getMockByCalls(ContainerInterface::class, [
            Call::create('get')->with(RoutesByNameInterface::class)->willReturn($routesByName),
            Call::create('get')->with('config')->willReturn($config),
        ]);

        $factory = new RouteMatcherFactory();

        self::assertInstanceOf(RouteMatcherInterface::class, $factory($container));
    }
}
