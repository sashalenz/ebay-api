<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Fee Data
 *
 * Represents a single fee for a listing.
 */
class FeeData extends Data
{
    public function __construct(
        public ?AmountData $amount = null,
        public ?string $feeType = null,
    ) {}
}
