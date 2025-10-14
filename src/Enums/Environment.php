<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Enums;

/**
 * eBay API Environment
 *
 * Defines the available eBay API environments for making requests.
 */
enum Environment: string
{
    case SANDBOX = 'sandbox';
    case PRODUCTION = 'production';

    /**
     * Get the base URL for the OAuth API
     */
    public function oauthBaseUrl(): string
    {
        return match ($this) {
            self::SANDBOX => 'https://api.sandbox.ebay.com',
            self::PRODUCTION => 'https://api.ebay.com',
        };
    }

    /**
     * Get the base URL for the REST API
     */
    public function apiBaseUrl(): string
    {
        return match ($this) {
            self::SANDBOX => 'https://api.sandbox.ebay.com',
            self::PRODUCTION => 'https://api.ebay.com',
        };
    }
}
