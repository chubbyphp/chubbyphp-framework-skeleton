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

    public function __construct(string $rootDir)
    {
        $this->rootDir = $rootDir;
    }

    /**
     * @return array<string, string>
     */
    public function getDirectories(): array
    {
        return [
            'cache' => $this->getCacheDir(),
        ];
    }

    protected function getCacheDir(): string
    {
        return $this->rootDir.'/var/cache/'.$this->getEnv();
    }
}
