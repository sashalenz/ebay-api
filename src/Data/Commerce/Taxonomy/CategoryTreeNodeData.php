<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Category Tree Node Data
 *
 * Represents a node in the eBay category tree hierarchy.
 * This is a recursive structure where each node can have child nodes.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:CategoryTreeNode
 */
class CategoryTreeNodeData extends Data
{
    /**
     * Create a new Category Tree Node Data instance
     *
     * @param  CategoryData|null  $category  Details about the current category tree node
     * @param  int|null  $categoryTreeNodeLevel  The absolute level of the current category tree node in the hierarchy (root is 0)
     * @param  DataCollection<int, CategoryTreeNodeData>|null  $childCategoryTreeNodes  Array of immediate child nodes (recursive structure)
     * @param  bool|null  $leafCategoryTreeNode  True if this is a leaf node (no children), false otherwise
     * @param  string|null  $parentCategoryTreeNodeHref  The href to get the subtree below the parent of this node
     */
    public function __construct(
        public ?CategoryData $category = null,
        public ?int $categoryTreeNodeLevel = null,
        #[DataCollectionOf(CategoryTreeNodeData::class)]
        public ?DataCollection $childCategoryTreeNodes = null,
        public ?bool $leafCategoryTreeNode = null,
        public ?string $parentCategoryTreeNodeHref = null,
    ) {}
}
