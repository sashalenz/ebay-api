<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Bulk Response Data
 *
 * Response from bulk operations.
 */
class BulkResponseData extends Data
{
    public function __construct(
        public ?array $responses = null,
    ) {}
}
