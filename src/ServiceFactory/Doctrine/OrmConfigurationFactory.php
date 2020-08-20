<?php

declare(strict_types=1);

namespace App\ServiceFactory\Doctrine;

use Doctrine\ORM\Configuration;
use Psr\Container\ContainerInterface;

final class OrmConfigurationFactory extends AbstractNamedFactory
{
    public function __invoke(ContainerInterface $container): Configuration
    {
        $config = new Configuration();

        /** @var array $orm */
        $orm = $container->get('config')['doctrine']['orm'];

        foreach (('' !== $this->name ? $orm[$this->name]['configuration'] : $orm['configuration']) as $key => $value) {
            $setter = 'set'.ucfirst($key);
            if (!is_callable([$config, $setter])) {
                throw new \LogicException(sprintf('There is no setter with name: "%s', $setter));
            }

            $value = is_string($value) && $container->has($value) ? $container->get($value) : $value;

            $config->{$setter}($value);
        }

        return $config;
    }
}
