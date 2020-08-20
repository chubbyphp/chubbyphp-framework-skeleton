<?php

declare(strict_types=1);

namespace App\ServiceFactory\Doctrine;

use Psr\Container\ContainerInterface;

abstract class AbstractNamedFactory
{
    /**
     * @var string
     */
    protected $name;

    public function __construct(string $name = '')
    {
        $this->name = $name;
    }

    public static function __callStatic(string $name, array $arguments)
    {
        return (new static($name))($arguments[0]);
    }

    abstract public function __invoke(ContainerInterface $container);
}
