<?php

declare(strict_types=1);

namespace App;

use App\Config\DevConfig;
use App\Config\PhpunitConfig;
use App\Config\ProdConfig;
use Chubbyphp\Config\ConfigMapping;
use Chubbyphp\Config\ConfigProvider;
use Chubbyphp\Config\Pimple\ConfigServiceProvider;
use Pimple\Container;

$env = $env ?? 'dev';

$configProvider = new ConfigProvider(__DIR__.'/..', [
    new ConfigMapping('dev', DevConfig::class),
    new ConfigMapping('prod', ProdConfig::class),
    new ConfigMapping('phpunit', PhpunitConfig::class),
]);

$container = new Container(['env' => $env]);

// always load this service provider last
// so that the values of other service providers can be overwritten.
$container->register(new ConfigServiceProvider($configProvider));

return $container;
