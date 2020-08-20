<?php

declare(strict_types=1);

namespace App\Doctrine\Driver;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping\MappingException;

interface ClassMapMappingInterface
{
    /**
     * @throws MappingException
     */
    public function configureMapping(ClassMetadata $metadata);
}
