<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Data;

/**
 * Category Data
 *
 * Represents a category from the eBay Commerce Taxonomy API.
 * Contains the unique identifier and name of the eBay category.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:Category
 */
class CategoryData extends Data
{
    /**
     * Create a new Category Data instance
     *
     * @param  string|null  $categoryId  The unique identifier of the eBay category within its category tree
     * @param  string|null  $categoryName  The name of the category
     */
    public function __construct(
        public ?string $categoryId = null,
        public ?string $categoryName = null,
    ) {}
}
