<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Catalog;

use Spatie\LaravelData\Data;

/**
 * Product Aspect Data
 *
 * Aspect information for a catalog product.
 */
class ProductAspectData extends Data
{
    public function __construct(
        public ?string $localizedName = null,
        public ?array $localizedValues = null,
    ) {}
}
