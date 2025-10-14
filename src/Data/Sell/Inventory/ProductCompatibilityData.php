<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Product Compatibility Data
 *
 * Complete product compatibility information.
 */
class ProductCompatibilityData extends Data
{
    public function __construct(
        public ?string $sku = null,
        #[DataCollectionOf(CompatibilityData::class)]
        public ?DataCollection $compatibility = null,
    ) {}
}
