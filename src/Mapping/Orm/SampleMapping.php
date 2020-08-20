<?php

declare(strict_types=1);

namespace App\Mapping\Orm;

use App\Doctrine\Driver\ClassMapMappingInterface;
use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;
use Doctrine\ORM\Mapping\ClassMetadata;

final class SampleMapping implements ClassMapMappingInterface
{
    public function configureMapping(ClassMetadata $metadata): void
    {
        $builder = new ClassMetadataBuilder($metadata);
        $builder->setTable('sample');
        $builder->createField('id', 'guid')->makePrimaryKey()->build();
        $builder->addField('createdAt', 'datetime');
        $builder->addField('updatedAt', 'datetime', ['nullable' => true]);
        $builder->addField('name', 'string');
    }
}
