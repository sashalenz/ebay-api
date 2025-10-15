<?php

return [

    /**
     * eBay Application ID (Client ID)
     */
    'app_id' => env('EBAY_APP_ID'),

    /**
     * eBay Certificate ID (Client Secret)
     */
    'cert_id' => env('EBAY_CERT_ID'),

    /**
     * eBay Developer ID
     */
    'dev_id' => env('EBAY_DEV_ID'),

    /**
     * eBay API Environment: sandbox or production
     */
    'environment' => env('EBAY_ENVIRONMENT', 'sandbox'),

    /**
     * Default Marketplace ID
     */
    'marketplace_id' => env('EBAY_MARKETPLACE_ID', 'EBAY_US'),

    /**
     * Default Content Language
     */
    'content_language' => env('EBAY_CONTENT_LANGUAGE', 'en-US'),

    /**
     * Request timeout in seconds
     */
    'timeout' => env('EBAY_TIMEOUT', 30),

    /**
     * Token cache TTL in seconds (default 55 minutes, tokens expire after 1 hour)
     */
    'token_cache_ttl' => env('EBAY_TOKEN_CACHE_TTL', 3300),

    /**
     * OAuth Scopes for Application Token (Client Credentials flow)
     * Default: base scope that provides access to most APIs
     * You can customize this if you need specific scopes
     */
    'scopes' => env('EBAY_OAUTH_SCOPES', 'https://api.ebay.com/oauth/api_scope'),

    /**
     * Platform Notifications Configuration
     * Configure webhook endpoint for receiving eBay SOAP notifications
     */
    'notifications' => [
        'enabled' => env('EBAY_NOTIFICATIONS_ENABLED', true),
        'route_path' => env('EBAY_NOTIFICATIONS_ROUTE', 'ebay/notifications'),
        'validate_signature' => env('EBAY_NOTIFICATIONS_VALIDATE_SIGNATURE', false),
        'queue' => env('EBAY_NOTIFICATIONS_QUEUE', 'default'),
        'store_in_database' => env('EBAY_NOTIFICATIONS_STORE_DB', true),
        'signature_tolerance_minutes' => 10,
    ],

    /**
     * Marketplace Account Deletion Notifications (GDPR Compliance)
     * Configure endpoint for receiving marketplace account deletion notifications
     *
     * @see https://developer.ebay.com/marketplace-account-deletion
     */
    'marketplace_account_deletion' => [
        'enabled' => env('EBAY_MAD_ENABLED', false),
        'route_path' => env('EBAY_MAD_ROUTE', 'ebay/account-deletion'),

        /**
         * Verification Token (32-80 characters)
         * Required for endpoint validation by eBay.
         * Generate a secure random token: openssl rand -base64 48
         */
        'verification_token' => env('EBAY_MAD_VERIFICATION_TOKEN'),

        /**
         * Queue for async processing of deletion notifications
         */
        'queue' => env('EBAY_MAD_QUEUE', 'default'),

        /**
         * Store deletion notifications in database
         */
        'store_in_database' => env('EBAY_MAD_STORE_DB', true),
    ],

];
