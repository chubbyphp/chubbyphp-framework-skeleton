<?php

declare(strict_types=1);

namespace App\Config;

use Chubbyphp\Config\ConfigInterface;

abstract class AbstractConfig implements ConfigInterface
{
    /**
     * @var string
     */
    protected $rootDir;

    private function __construct()
    {
    }

    public static function create(string $rootDir): ConfigInterface
    {
        $config = new static();
        $config->rootDir = $rootDir;

        return $config;
    }

    public function getDirectories(): array
    {
        return [
            'cache' => $this->getCacheDir(),
        ];
    }

    abstract protected function getEnv(): string;

    protected function getCacheDir(): string
    {
        return $this->rootDir.'/var/cache/'.$this->getEnv();
    }
}
