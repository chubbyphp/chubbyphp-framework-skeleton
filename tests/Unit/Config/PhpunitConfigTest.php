<?php

declare(strict_types=1);

namespace App\Tests\Unit\Config;

use App\Config\PhpunitConfig;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Config\AbstractConfig
 * @covers \App\Config\PhpunitConfig
 */
final class PhpunitConfigTest extends TestCase
{
    public function testGetConfig(): void
    {
        $config = PhpunitConfig::create('/path/to/root');

        self::assertSame([
            'debug' => true,
            'routerCacheFile' => null,
        ], $config->getConfig());
    }

    public function testGetDirectories(): void
    {
        $config = PhpunitConfig::create('/path/to/root');

        self::assertSame([
            'cache' => '/path/to/root/var/cache/phpunit',
        ], $config->getDirectories());
    }
}
