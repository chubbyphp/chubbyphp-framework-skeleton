<?php

declare(strict_types=1);

namespace App\ServiceFactory\Doctrine;

use Doctrine\DBAL\Configuration;
use Psr\Container\ContainerInterface;

final class DbalConfigurationFactory extends AbstractNamedFactory
{
    public function __invoke(ContainerInterface $container): Configuration
    {
        $config = new Configuration();

        /** @var array $dbal */
        $dbal = $container->get('config')['doctrine']['dbal'];

        foreach (('' !== $this->name ? $dbal[$this->name]['configuration'] : $dbal['configuration']) as $key => $value) {
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
