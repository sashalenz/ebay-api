<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Catalog;

use Spatie\LaravelData\Data;

/**
 * Product Image Data
 *
 * Image information for a catalog product.
 */
class ProductImageData extends Data
{
    public function __construct(
        public ?string $imageUrl = null,
    ) {}
}
