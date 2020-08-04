#!/usr/bin/env php
<?php

declare(strict_types=1);

namespace App;

use App\Command\CleanDirectoriesCommand;
use Chubbyphp\Container\Container;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Input\InputOption;

require __DIR__.'/../vendor/autoload.php';

$input = new ArgvInput();

$env = $input->getParameterOption(['--env', '-e'], 'dev');

/** @var Container $container */
$container = (require __DIR__.'/container.php')($env);

$console = new Application();
$console->getDefinition()->addOption(
    new InputOption('--env', '-e', InputOption::VALUE_REQUIRED, 'The Environment name.', 'dev')
);
$console->add($container->get(CleanDirectoriesCommand::class));
$console->run($input);
