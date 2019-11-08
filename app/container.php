<?php

declare(strict_types=1);

namespace App;

use Pimple\Container;
use Pimple\Psr11\Container as PsrContainer;

return static function (string $env) {
    $container = new Container(['env' => $env]);

    $container[PsrContainer::class] = static function () use ($container) {
        return new PsrContainer($container);
    };

    return $container;
};
