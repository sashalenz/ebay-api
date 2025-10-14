<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Sashalenz\EbayApi\Enums\LengthUnitOfMeasure;
use Spatie\LaravelData\Data;

/**
 * Dimension Data
 *
 * Represents package dimensions.
 */
class DimensionData extends Data
{
    public function __construct(
        public ?float $height = null,
        public ?float $length = null,
        public ?float $width = null,
        public ?LengthUnitOfMeasure $unit = null,
    ) {}
}
