<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceFactory;

use App\ServiceFactory\ResponseFactoryFactory;
use Chubbyphp\Mock\MockByCallsTrait;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Slim\Psr7\Factory\ResponseFactory;

/**
 * @covers \App\ServiceFactory\ResponseFactoryFactory
 *
 * @internal
 */
final class ResponseFactoryFactoryTest extends TestCase
{
    use MockByCallsTrait;

    public function testInvoke(): void
    {
        /** @var ContainerInterface|MockObject $container */
        $container = $this->getMockByCalls(ContainerInterface::class);

        $factory = new ResponseFactoryFactory();

        self::assertInstanceOf(ResponseFactory::class, $factory($container));
    }
}
