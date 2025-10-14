<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Interval Data
 *
 * Time interval for operating hours.
 */
class IntervalData extends Data
{
    public function __construct(
        public ?string $open = null,
        public ?string $close = null,
    ) {}
}
