<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Amount Data
 *
 * Represents a monetary amount with currency.
 */
class AmountData extends Data
{
    public function __construct(
        public ?string $currency = null,
        public ?string $value = null,
    ) {}
}
