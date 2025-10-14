<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Sashalenz\EbayApi\Enums\PackageType;
use Spatie\LaravelData\Data;

/**
 * Package Weight And Size Data
 *
 * Represents package weight and dimensions.
 */
class PackageWeightAndSizeData extends Data
{
    public function __construct(
        public ?DimensionData $dimensions = null,
        public ?PackageType $packageType = null,
        public ?bool $shippingIrregular = null,
        public ?WeightData $weight = null,
    ) {}
}
