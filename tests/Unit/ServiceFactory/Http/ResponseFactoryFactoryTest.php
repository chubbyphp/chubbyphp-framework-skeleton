<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceFactory\Http;

use App\ServiceFactory\Http\ResponseFactoryFactory;
use PHPUnit\Framework\TestCase;
use Slim\Psr7\Factory\ResponseFactory;

/**
 * @covers \App\ServiceFactory\Http\ResponseFactoryFactory
 *
 * @internal
 */
final class ResponseFactoryFactoryTest extends TestCase
{
    public function testInvoke(): void
    {
        $factory = new ResponseFactoryFactory();

        self::assertInstanceOf(ResponseFactory::class, $factory());
    }
}
