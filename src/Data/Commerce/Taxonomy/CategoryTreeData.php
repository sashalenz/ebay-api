<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Sashalenz\EbayApi\Enums\MarketplaceId;
use Spatie\LaravelData\Data;

/**
 * Category Tree Data
 *
 * Represents the complete eBay category tree hierarchy for a marketplace.
 * Contains all categories from root to leaf nodes in a recursive structure.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_tree/methods/getCategoryTree
 */
class CategoryTreeData extends Data
{
    /**
     * Create a new Category Tree Data instance
     *
     * @param  string|null  $categoryTreeId  The unique identifier of this eBay category tree
     * @param  string|null  $categoryTreeVersion  The version of this category tree (cache this for comparison)
     * @param  array<int, MarketplaceId>|null  $applicableMarketplaceIds  List of eBay marketplace IDs that use this category tree
     * @param  CategoryTreeNodeData|null  $rootCategoryNode  The root node of the category tree hierarchy (recursive structure)
     */
    public function __construct(
        public ?string $categoryTreeId = null,
        public ?string $categoryTreeVersion = null,
        public ?array $applicableMarketplaceIds = null,
        public ?CategoryTreeNodeData $rootCategoryNode = null,
    ) {}
}
