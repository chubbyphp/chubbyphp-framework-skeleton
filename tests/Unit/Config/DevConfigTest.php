<?php

declare(strict_types=1);

namespace App\Tests\Unit\Config;

use App\Config\DevConfig;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Config\AbstractConfig
 * @covers \App\Config\DevConfig
 *
 * @internal
 */
final class DevConfigTest extends TestCase
{
    public function testGetConfig(): void
    {
        $config = new DevConfig('/path/to/root');

        self::assertSame([
            'debug' => true,
            'routerCacheFile' => null,
        ], $config->getConfig());
    }

    public function testGetDirectories(): void
    {
        $config = new DevConfig('/path/to/root');

        self::assertSame([
            'cache' => '/path/to/root/var/cache/dev',
        ], $config->getDirectories());
    }

    public function testgetEnv(): void
    {
        $config = new DevConfig('/path/to/root');

        self::assertSame('dev', $config->getEnv());
    }
}
