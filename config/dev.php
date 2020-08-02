<?php

declare(strict_types=1);

$config = require __DIR__ . '/prod.php';

$config['debug'] = true;
$config['routerCacheFile'] = null;

return $config;
