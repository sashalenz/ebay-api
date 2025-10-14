<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Stores;

use Spatie\LaravelData\Data;

/**
 * Store Category Data
 *
 * Represents a single store category.
 */
class StoreCategoryData extends Data
{
    public function __construct(
        public ?string $categoryId = null,
        public ?string $categoryName = null,
        public ?string $parentCategoryId = null,
        public ?int $categoryOrder = null,
        public ?int $listingCount = null,
        public ?int $categoryLevel = null,
    ) {}
}
