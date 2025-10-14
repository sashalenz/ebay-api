<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Exceptions;

/**
 * Invalid Notification Signature Exception
 *
 * Thrown when eBay notification signature validation fails.
 */
class InvalidNotificationSignatureException extends EbayApiException
{
    public static function signatureMismatch(string $expected, string $received): self
    {
        return new self('Notification signature validation failed. Expected signature does not match received signature.');
    }

    public static function timestampOutOfRange(string $timestamp, int $toleranceMinutes): self
    {
        return new self("Notification timestamp '{$timestamp}' is outside the acceptable range of {$toleranceMinutes} minutes.");
    }
}
