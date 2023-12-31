<?php

declare(strict_types=1);

namespace App\Tests\Integration;

/**
 * @internal
 *
 * @coversNothing
 */
final class PingRequestHandlerTest extends AbstractIntegrationTestCase
{
    public function testPing(): void
    {
        $now = \DateTimeImmutable::createFromFormat(\DateTime::ATOM, date('c'));

        $response = $this->httpRequest(
            'GET',
            '/ping'
        );

        self::assertSame(200, $response['status']['code']);

        self::assertSame('application/json', $response['headers']['content-type'][0]);
        self::assertSame('no-cache, no-store, must-revalidate', $response['headers']['cache-control'][0]);
        self::assertSame('0', $response['headers']['expires'][0]);
        self::assertSame('no-cache', $response['headers']['pragma'][0]);

        $ping = json_decode($response['body'], true, 512, JSON_THROW_ON_ERROR);

        self::assertArrayHasKey('datetime', $ping);

        self::assertMatchesRegularExpression(self::DATE_PATTERN, $ping['datetime']);

        $datetime = new \DateTimeImmutable($ping['datetime']);

        self::assertGreaterThanOrEqual($now, $datetime);
    }
}
