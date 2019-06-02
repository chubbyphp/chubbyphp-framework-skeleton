<?php

declare(strict_types=1);

namespace App\Config;

class ProdConfig extends AbstractConfig
{
    /**
     * @return array
     */
    public function getConfig(): array
    {
        $cacheDir = $this->getCacheDir();

        return [
            'debug' => false,
            'routerCacheFile' => $cacheDir.'/fast-route-routes.php',
        ];
    }

    /**
     * @return string
     */
    protected function getEnv(): string
    {
        return 'prod';
    }
}
