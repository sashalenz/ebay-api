<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Tests\Concerns;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\ContentLanguage;
use Sashalenz\EbayApi\Enums\Environment;
use Sashalenz\EbayApi\Enums\MarketplaceId;

/**
 * Mocks API Responses Trait
 *
 * Provides helper methods for mocking Guzzle HTTP responses in tests.
 */
trait MocksApiResponses
{
    /**
     * Create a mock Guzzle response
     */
    protected function mockGuzzleResponse(
        int $statusCode = 200,
        array $body = [],
        array $headers = []
    ): Response {
        $defaultHeaders = array_merge([
            'Content-Type' => 'application/json',
        ], $headers);

        return new Response(
            $statusCode,
            $defaultHeaders,
            json_encode($body)
        );
    }

    /**
     * Create a success response
     */
    protected function successResponse(array $body = []): Response
    {
        return $this->mockGuzzleResponse(200, $body);
    }

    /**
     * Create an error response
     */
    protected function errorResponse(int $statusCode = 400, array $body = []): Response
    {
        return $this->mockGuzzleResponse($statusCode, $body);
    }

    /**
     * Create a mock EbayClient with mocked responses
     *
     * @param  array<Response>  $responses
     */
    protected function createMockClient(array $responses = []): EbayClient
    {
        $mock = new MockHandler($responses);
        $handlerStack = HandlerStack::create($mock);
        $guzzleClient = new Client(['handler' => $handlerStack]);

        return new EbayClient(
            appId: 'test_app_id',
            certId: 'test_cert_id',
            environment: Environment::SANDBOX,
            marketplaceId: MarketplaceId::EBAY_US,
            contentLanguage: ContentLanguage::EN_US,
            timeout: 30,
            tokenCacheTtl: 3300,
            scopes: 'https://api.ebay.com/oauth/api_scope',
            httpClient: $guzzleClient
        );
    }

    /**
     * Load a JSON fixture file
     */
    protected function loadFixture(string $filename): array
    {
        $path = __DIR__.'/../Fixtures/'.$filename;

        if (! file_exists($path)) {
            throw new \RuntimeException("Fixture file not found: {$path}");
        }

        $content = file_get_contents($path);

        return json_decode($content, true);
    }
}
