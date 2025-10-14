<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Facades;

use Illuminate\Support\Facades\Facade;
use Sashalenz\EbayApi\Client\EbayClient;

/**
 * eBay API Facade
 *
 * @method static \Sashalenz\EbayApi\Enums\Environment getEnvironment()
 * @method static \Sashalenz\EbayApi\Enums\MarketplaceId getMarketplaceId()
 * @method static \Sashalenz\EbayApi\Enums\ContentLanguage getContentLanguage()
 * @method static \Psr\Http\Message\ResponseInterface get(string $endpoint, array $query = [], array $headers = [])
 * @method static \Psr\Http\Message\ResponseInterface post(string $endpoint, array $body = [], array $headers = [])
 * @method static \Psr\Http\Message\ResponseInterface put(string $endpoint, array $body = [], array $headers = [])
 * @method static \Psr\Http\Message\ResponseInterface delete(string $endpoint, array $headers = [])
 * @method static void clearAuthToken()
 *
 * @see EbayClient
 */
class EbayApi extends Facade
{
    /**
     * Get the registered name of the component
     */
    protected static function getFacadeAccessor(): string
    {
        return 'ebay-api';
    }
}
