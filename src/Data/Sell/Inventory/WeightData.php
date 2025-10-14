<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Sashalenz\EbayApi\Enums\WeightUnitOfMeasure;
use Spatie\LaravelData\Data;

/**
 * Weight Data
 *
 * Represents package weight.
 */
class WeightData extends Data
{
    public function __construct(
        public ?WeightUnitOfMeasure $unit = null,
        public ?float $value = null,
    ) {}
}
