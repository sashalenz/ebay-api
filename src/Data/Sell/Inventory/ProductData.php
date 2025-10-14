<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Product Data
 *
 * Represents product details for an inventory item.
 */
class ProductData extends Data
{
    public function __construct(
        public ?string $title = null,
        public ?string $description = null,
        public ?string $subtitle = null,
        public ?array $aspects = null,
        public ?string $brand = null,
        public ?string $mpn = null,
        public ?string $epid = null,
        public ?array $imageUrls = null,
        public ?array $videoIds = null,
        public ?array $ean = null,
        public ?array $isbn = null,
        public ?array $upc = null,
    ) {}
}
