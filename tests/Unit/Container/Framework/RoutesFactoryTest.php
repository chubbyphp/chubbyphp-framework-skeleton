<?php

declare(strict_types=1);

namespace App\Tests\Unit\Container\Framework;

use App\Container\Framework\RoutesFactory;
use App\RequestHandler\PingRequestHandler;
use Chubbyphp\Framework\RequestHandler\LazyRequestHandler;
use Chubbyphp\Framework\Router\Route;
use Chubbyphp\Mock\MockByCallsTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @covers \App\Container\Framework\RoutesFactory
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

        $factory = new RoutesFactory();

        self::assertEquals([
            Route::get('/ping', 'ping', new LazyRequestHandler($container, PingRequestHandler::class)),
        ], $factory($container));
    }
}
