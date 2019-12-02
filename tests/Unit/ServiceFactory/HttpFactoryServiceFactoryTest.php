<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceFactory;

use App\ServiceFactory\HttpFactoryServiceFactory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseFactoryInterface;

/**
 * @covers \App\ServiceFactory\HttpFactoryServiceFactory
 *
 * @internal
 */
final class HttpFactoryServiceFactoryTest extends TestCase
{
    public function testFactories(): void
    {
        $factories = (new HttpFactoryServiceFactory())();

        self::assertCount(1, $factories);
    }

    public function testPingHttpFactory(): void
    {
        $factories = (new HttpFactoryServiceFactory())();

        self::assertArrayHasKey(ResponseFactoryInterface::class, $factories);

        self::assertInstanceOf(
            ResponseFactoryInterface::class,
            $factories[ResponseFactoryInterface::class]()
        );
    }
}
