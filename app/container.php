<?php

declare(strict_types=1);

namespace App;

use App\Config\DevConfig;
use App\Config\PhpunitConfig;
use App\Config\ProdConfig;
use Chubbyphp\Config\ConfigProvider;
use Chubbyphp\Config\ServiceProvider\ConfigServiceProvider;
use Pimple\Container;

$env = $env ?? 'dev';

$rootDir = __DIR__.'/..';

$container = new Container(['env' => $env]);

// always load this service provider last
// so that the values of other service providers can be overwritten.
$container->register(new ConfigServiceProvider(
    new ConfigProvider([
        new DevConfig($rootDir),
        new ProdConfig($rootDir),
        new PhpunitConfig($rootDir),
    ])
));

return $container;
