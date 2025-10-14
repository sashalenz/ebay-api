<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Catalog;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Product Data
 *
 * Complete eBay catalog product information.
 */
class ProductData extends Data
{
    public function __construct(
        public ?string $epid = null,
        public ?string $title = null,
        public ?string $description = null,
        public ?string $brand = null,
        public ?string $mpn = null,
        public ?array $ean = null,
        public ?array $isbn = null,
        public ?array $upc = null,
        #[DataCollectionOf(ProductImageData::class)]
        public ?DataCollection $imageUrls = null,
        #[DataCollectionOf(ProductAspectData::class)]
        public ?DataCollection $aspects = null,
    ) {}
}
