<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Exceptions;

/**
 * Authentication exception
 *
 * Thrown when there are issues with API authentication (OAuth tokens, credentials, etc.)
 */
class AuthenticationException extends EbayApiException
{
    /**
     * Create a new authentication exception for invalid credentials
     */
    public static function invalidCredentials(): self
    {
        return new self('Invalid eBay API credentials. Please check your app_id and cert_id.');
    }

    /**
     * Create a new authentication exception for token generation failure
     */
    public static function tokenGenerationFailed(string $reason = ''): self
    {
        $message = 'Failed to generate eBay API token.';

        if ($reason) {
            $message .= ' Reason: '.$reason;
        }

        return new self($message);
    }

    /**
     * Create a new authentication exception for expired token
     */
    public static function tokenExpired(): self
    {
        return new self('eBay API token has expired.');
    }
}
