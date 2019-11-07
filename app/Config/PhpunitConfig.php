<?php

declare(strict_types=1);

namespace App\Config;

final class PhpunitConfig extends DevConfig
{
    public function getEnv(): string
    {
        return 'phpunit';
    }
}
