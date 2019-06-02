<?php

declare(strict_types=1);

namespace App\Config;

class PhpunitConfig extends DevConfig
{
    /**
     * @return string
     */
    protected function getEnv(): string
    {
        return 'phpunit';
    }
}
