<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Data;

/**
 * Category Subtree Data
 *
 * Represents a subtree of the eBay category tree hierarchy.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_tree/methods/getCategorySubtree
 */
class CategorySubtreeData extends Data
{
    /**
     * Create a new Category Subtree Data instance
     *
     * @param  CategoryTreeNodeData|null  $categorySubtreeNode  The root node of the subtree
     * @param  string|null  $categoryTreeId  The unique identifier of the eBay category tree
     * @param  string|null  $categoryTreeVersion  The version of the category tree
     */
    public function __construct(
        public ?CategoryTreeNodeData $categorySubtreeNode = null,
        public ?string $categoryTreeId = null,
        public ?string $categoryTreeVersion = null,
    ) {}
}
