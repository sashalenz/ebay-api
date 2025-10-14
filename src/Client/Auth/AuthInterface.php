<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Client\Auth;

use Sashalenz\EbayApi\Exceptions\AuthenticationException;

/**
 * Authentication Interface
 *
 * Defines the contract for eBay API authentication mechanisms.
 * Supports both Application Token (Client Credentials) and User Token (Authorization Code) flows.
 */
interface AuthInterface
{
    /**
     * Get a valid access token
     *
     * @return string The OAuth 2.0 access token
     *
     * @throws AuthenticationException
     */
    public function getToken(): string;
}
