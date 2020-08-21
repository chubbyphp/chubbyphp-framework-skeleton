<?php

declare(strict_types=1);

namespace App\Tests\Unit\Container\Framework;

use App\Container\Framework\MiddlewaresFactory;
use Chubbyphp\Framework\Middleware\ExceptionMiddleware;
use Chubbyphp\Framework\Middleware\LazyMiddleware;
use Chubbyphp\Framework\Middleware\RouterMiddleware;
use Chubbyphp\Mock\MockByCallsTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

/**
 * @covers \App\Container\Framework\MiddlewaresFactory
 *
 * @internal
 */
final class MiddlewaresFactoryTest extends TestCase
{
    use MockByCallsTrait;

    public function testInvoke(): void
    {
        /** @var ContainerInterface|MockObject $container */
        $container = $this->getMockByCalls(ContainerInterface::class);

        $factory = new MiddlewaresFactory();

        self::assertEquals([
            new LazyMiddleware($container, ExceptionMiddleware::class),
            new LazyMiddleware($container, RouterMiddleware::class),
        ], $factory($container));
    }
}
