<?php

declare(strict_types=1);

namespace App\ServiceFactory\Doctrine;

use Doctrine\Common\Cache\ApcuCache;
use Doctrine\Common\Cache\CacheProvider;
use Psr\Container\ContainerInterface;

final class ApcuCacheFactory
{
    public function __invoke(ContainerInterface $container): CacheProvider
    {
        return new ApcuCache();
    }
}
