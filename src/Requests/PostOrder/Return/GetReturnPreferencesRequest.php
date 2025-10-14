<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Return Preferences Request
 *
 * Get seller's return preferences and settings.
 */
class GetReturnPreferencesRequest extends Request
{
    protected string $method = 'GET';

    public function __construct() {}

    public static function make(): static
    {
        return new static;
    }

    public function resolveEndpoint(): string
    {
        return '/post-order/v2/return/preference';
    }
}
