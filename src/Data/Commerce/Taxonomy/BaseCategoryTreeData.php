<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Data;

/**
 * Base Category Tree Data
 *
 * Represents basic category tree information (ID and version).
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_tree/methods/getDefaultCategoryTreeId
 */
class BaseCategoryTreeData extends Data
{
    /**
     * Create a new Base Category Tree Data instance
     *
     * @param  string|null  $categoryTreeId  The unique identifier of the eBay category tree
     * @param  string|null  $categoryTreeVersion  The version of the category tree
     */
    public function __construct(
        public ?string $categoryTreeId = null,
        public ?string $categoryTreeVersion = null,
    ) {}
}
