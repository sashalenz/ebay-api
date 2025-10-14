<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Exceptions;

use Exception;

/**
 * Base exception for all eBay API related errors
 *
 * This is the parent exception that all other eBay API exceptions extend from.
 */
class EbayApiException extends Exception
{
    /**
     * Create a new eBay API exception
     *
     * @param  string  $message  The exception message
     * @param  int  $code  The exception code
     * @param  Exception|null  $previous  The previous exception
     */
    public function __construct(string $message = '', int $code = 0, ?Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
