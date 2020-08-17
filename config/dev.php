<?php

declare(strict_types=1);

use Monolog\Logger;

$config = require __DIR__.'/prod.php';

$config['debug'] = true;
$config['fastroute']['cache'] = null;
$config['monolog']['level'] = Logger::DEBUG;

return $config;
