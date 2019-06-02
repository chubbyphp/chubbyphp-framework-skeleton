<?php

declare(strict_types=1);

namespace App\Tests\Unit\ServiceProvider;

use App\Controller\PingController;
use App\ServiceProvider\ControllerServiceProvider;
use Chubbyphp\Mock\MockByCallsTrait;
use PHPUnit\Framework\TestCase;
use Pimple\Container;
use Psr\Http\Message\ResponseFactoryInterface;

/**
 * @covers \App\ServiceProvider\ControllerServiceProvider
 */
final class ControllerServiceProviderTest extends TestCase
{
    use MockByCallsTrait;

    public function testRegister(): void
    {
        $container = new Container([
            ResponseFactoryInterface::class => $this->getMockByCalls(ResponseFactoryInterface::class),
        ]);

        $serviceProvider = new ControllerServiceProvider();
        $serviceProvider->register($container);

        self::assertInstanceOf(PingController::class, $container[PingController::class]);
    }
}
