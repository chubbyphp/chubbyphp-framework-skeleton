<?php

declare(strict_types=1);

namespace App\ServiceFactory\Doctrine;

use App\Doctrine\Driver\ClassMapDriver;
use App\Entity\Sample;
use App\Mapping\Orm\SampleMapping;
use Doctrine\Persistence\Mapping\Driver\MappingDriver;
use Psr\Container\ContainerInterface;

final class ClassMapDriverFactory
{
    public function __invoke(ContainerInterface $container): MappingDriver
    {
        return new ClassMapDriver([
            Sample::class => SampleMapping::class,
        ]);
    }
}
