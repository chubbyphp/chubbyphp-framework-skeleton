<?php

declare(strict_types=1);

use Slim\Psr7\Factory\ServerRequestFactory;

$web = (require __DIR__.'/../app/web.php')('prod');
$web->send($web->handle((new ServerRequestFactory())->createFromGlobals()));
