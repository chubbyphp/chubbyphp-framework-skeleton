<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceFactory\Framework;

use App\ServiceFactory\Framework\UrlGeneratorFactory;
use Chubbyphp\Framework\Router\RoutesByNameInterface;
use Chubbyphp\Framework\Router\UrlGeneratorInterface;
use Chubbyphp\Mock\Call;
use Chubbyphp\Mock\MockByCallsTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @covers \App\ServiceFactory\Framework\UrlGeneratorFactory
 *
 * @internal
 */
final class UrlGeneratorFactoryTest extends TestCase
{
    use MockByCallsTrait;

    public function testInvoke(): void
    {
        /** @var ContainerInterface|MockObject $routesByName */
        $routesByName = $this->getMockByCalls(RoutesByNameInterface::class, [
            Call::create('getRoutesByName')->with()->willReturn([]),
        ]);

        /** @var ContainerInterface|MockObject $container */
        $container = $this->getMockByCalls(ContainerInterface::class, [
            Call::create('get')->with(RoutesByNameInterface::class)->willReturn($routesByName),
        ]);

        $factory = new UrlGeneratorFactory();

        self::assertInstanceOf(UrlGeneratorInterface::class, $factory($container));
    }
}
