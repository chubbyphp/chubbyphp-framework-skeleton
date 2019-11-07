<?php

declare(strict_types=1);

namespace App\Tests\Unit\Config;

use App\Config\ProdConfig;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Config\AbstractConfig
 * @covers \App\Config\ProdConfig
 *
 * @internal
 */
final class ProdConfigTest extends TestCase
{
    public function testGetConfig(): void
    {
        $config = new ProdConfig('/path/to/root');

        self::assertSame([
            'debug' => false,
            'routerCacheFile' => '/path/to/root/var/cache/prod/fast-route-routes.php',
        ], $config->getConfig());
    }

    public function testGetDirectories(): void
    {
        $config = new ProdConfig('/path/to/root');

        self::assertSame([
            'cache' => '/path/to/root/var/cache/prod',
        ], $config->getDirectories());
    }

    public function testGetEnvironment(): void
    {
        $config = new ProdConfig('/path/to/root');

        self::assertSame('prod', $config->getEnvironment());
    }
}
