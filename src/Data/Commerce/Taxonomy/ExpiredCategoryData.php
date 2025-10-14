<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Data;

/**
 * Expired Category Data
 *
 * Represents a mapping from an expired category to its active replacement.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:ExpiredCategory
 */
class ExpiredCategoryData extends Data
{
    /**
     * Create a new Expired Category Data instance
     *
     * @param  string|null  $fromCategoryId  The unique identifier of the expired eBay leaf category
     * @param  string|null  $toCategoryId  The unique identifier of the active eBay leaf category that replaced it
     */
    public function __construct(
        public ?string $fromCategoryId = null,
        public ?string $toCategoryId = null,
    ) {}
}
