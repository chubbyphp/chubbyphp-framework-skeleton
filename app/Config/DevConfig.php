<?php

declare(strict_types=1);

namespace App\Config;

class DevConfig extends ProdConfig
{
    public function getConfig(): array
    {
        $config = parent::getConfig();

        $config['debug'] = true;
        $config['routerCacheFile'] = null;

        return $config;
    }

    public function getEnv(): string
    {
        return 'dev';
    }
}
