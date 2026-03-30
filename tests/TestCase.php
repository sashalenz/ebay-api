<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Sashalenz\EbayApi\EbayApiServiceProvider;
use Sashalenz\EbayApi\Tests\Concerns\MocksApiResponses;
use Spatie\LaravelData\LaravelDataServiceProvider;
use Spatie\LaravelData\Normalizers\ArrayableNormalizer;
use Spatie\LaravelData\Normalizers\ArrayNormalizer;
use Spatie\LaravelData\Normalizers\JsonNormalizer;
use Spatie\LaravelData\Normalizers\ModelNormalizer;
use Spatie\LaravelData\Normalizers\ObjectNormalizer;

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
            LaravelDataServiceProvider::class,
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
        // Load Spatie Data default config and adjust for tests
        $spatieDataConfigPath = base_path('vendor/spatie/laravel-data/config/data.php');
        if (file_exists($spatieDataConfigPath)) {
            $dataConfig = require $spatieDataConfigPath;
            $dataConfig['validation_strategy'] = 'disabled';
            config()->set('data', $dataConfig);
        } else {
            // Fallback minimal config: use the common Spatie normalizers
            config()->set('data.validation_strategy', 'disabled');
            config()->set('data.normalizers', [
                ModelNormalizer::class,
                ArrayableNormalizer::class,
                ObjectNormalizer::class,
                ArrayNormalizer::class,
                JsonNormalizer::class,
            ]);
        }
    }
}
