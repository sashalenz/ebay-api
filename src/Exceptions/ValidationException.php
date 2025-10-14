<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Exceptions;

/**
 * Validation Exception
 *
 * Thrown when request validation fails before sending to API.
 */
class ValidationException extends EbayApiException
{
    /**
     * @param  array<string>  $errors
     */
    public function __construct(
        string $message = 'Request validation failed',
        public readonly array $errors = []
    ) {
        parent::__construct($message);
    }

    /**
     * Get validation errors
     *
     * @return array<string>
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Create exception from validation errors
     *
     * @param  array<string>  $errors
     */
    public static function withErrors(array $errors): self
    {
        return new self(
            'Request validation failed: '.implode(', ', $errors),
            $errors
        );
    }
}
