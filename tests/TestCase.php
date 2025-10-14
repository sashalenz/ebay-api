<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Sashalenz\EbayApi\EbayApiServiceProvider;
use Sashalenz\EbayApi\Tests\Concerns\MocksApiResponses;

/**
 * Base Test Case
 *
 * Provides the base test case for all package tests with Laravel integration.
 */
class TestCase extends Orchestra
{
    use MocksApiResponses;

    /**
     * Setup the test environment
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Additional setup if needed
    }

    /**
     * Get package providers
     */
    protected function getPackageProviders($app): array
    {
        return [
            EbayApiServiceProvider::class,
        ];
    }

    /**
     * Define environment setup
     */
    protected function getEnvironmentSetUp($app): void
    {
        // Setup test environment
        config()->set('ebay-api.app_id', 'test_app_id');
        config()->set('ebay-api.cert_id', 'test_cert_id');
        config()->set('ebay-api.dev_id', 'test_dev_id');
        config()->set('ebay-api.environment', 'sandbox');
        config()->set('ebay-api.marketplace_id', 'EBAY_US');
        config()->set('ebay-api.content_language', 'en-US');
    }
}
