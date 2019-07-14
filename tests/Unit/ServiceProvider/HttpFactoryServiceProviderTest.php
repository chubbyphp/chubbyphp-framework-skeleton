<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceProvider;

use App\ServiceProvider\HttpFactoryServiceProvider;
use PHPUnit\Framework\TestCase;
use Pimple\Container;
use Psr\Http\Message\ResponseFactoryInterface;

/**
 * @covers \App\ServiceProvider\HttpFactoryServiceProvider
 *
 * @internal
 */
final class HttpFactoryServiceProviderTest extends TestCase
{
    public function testRegister(): void
    {
        $container = new Container();

        $serviceProvider = new HttpFactoryServiceProvider();
        $serviceProvider->register($container);

        self::assertArrayHasKey(ResponseFactoryInterface::class, $container);

        self::assertInstanceOf(ResponseFactoryInterface::class, $container[ResponseFactoryInterface::class]);
    }
}
