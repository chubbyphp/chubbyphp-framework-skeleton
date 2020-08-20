<?php

declare(strict_types=1);

use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Helper\HelperSet;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Input\ArgvInput;

/** @var ContainerInterface $container */
$container = (require __DIR__.'/src/container.php')('dev');

return new HelperSet([
    'em' => new EntityManagerHelper(
        $container->get(EntityManager::class)
    ),
]);
