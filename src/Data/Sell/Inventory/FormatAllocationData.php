<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Format Allocation Data
 *
 * Represents quantity allocation by listing format.
 */
class FormatAllocationData extends Data
{
    public function __construct(
        public ?int $auction = null,
        public ?int $fixedPrice = null,
    ) {}
}
