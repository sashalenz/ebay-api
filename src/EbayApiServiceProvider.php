<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi;

use Illuminate\Support\Facades\Route;
use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\ContentLanguage;
use Sashalenz\EbayApi\Enums\Environment;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Http\Controllers\NotificationController;
use Sashalenz\EbayApi\Services\NotificationParser;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

/**
 * eBay API Service Provider
 *
 * Registers the eBay API package with Laravel, publishes configuration,
 * and binds the EbayClient to the service container.
 */
class EbayApiServiceProvider extends PackageServiceProvider
{
    /**
     * Configure the package
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('ebay-api')
            ->hasConfigFile()
            ->hasMigration('create_ebay_notifications_table');
    }

    /**
     * Register package services
     */
    public function packageRegistered(): void
    {
        $this->app->singleton(EbayClient::class, function ($app) {
            $config = config('ebay-api');

            return new EbayClient(
                appId: $config['app_id'] ?? '',
                certId: $config['cert_id'] ?? '',
                environment: Environment::from($config['environment'] ?? 'sandbox'),
                marketplaceId: MarketplaceId::from($config['marketplace_id'] ?? 'EBAY_US'),
                contentLanguage: ContentLanguage::from($config['content_language'] ?? 'en-US'),
                timeout: $config['timeout'] ?? 30,
                tokenCacheTtl: $config['token_cache_ttl'] ?? 3300,
                scopes: $config['scopes'] ?? 'https://api.ebay.com/oauth/api_scope'
            );
        });

        $this->app->alias(EbayClient::class, 'ebay-api');

        // Register NotificationParser
        $this->app->singleton(NotificationParser::class, function ($app) {
            $config = config('ebay-api');

            return new NotificationParser(
                devId: $config['dev_id'] ?? '',
                appId: $config['app_id'] ?? '',
                certId: $config['cert_id'] ?? ''
            );
        });
    }

    /**
     * Boot package services
     */
    public function packageBooted(): void
    {
        // Register notification webhook route if enabled
        if (config('ebay-api.notifications.enabled', true)) {
            Route::post(
                config('ebay-api.notifications.route_path', 'ebay/notifications'),
                NotificationController::class
            )->name('ebay-api.notifications');
        }
    }
}
