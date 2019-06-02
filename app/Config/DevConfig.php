<?php

declare(strict_types=1);

namespace App\Config;

class DevConfig extends ProdConfig
{
    /**
     * @return array
     */
    public function getConfig(): array
    {
        $config = parent::getConfig();
        $config['debug'] = true;
        $config['routerCacheFile'] = null;

        return $config;
    }

    /**
     * @return string
     */
    protected function getEnv(): string
    {
        return 'dev';
    }
}
