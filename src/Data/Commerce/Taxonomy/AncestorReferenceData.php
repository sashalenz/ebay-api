<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Data;

/**
 * Ancestor Reference Data
 *
 * Represents a reference to an ancestor category in the category tree hierarchy.
 * Used in category suggestions to show the path from root to the suggested category.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:AncestorReference
 */
class AncestorReferenceData extends Data
{
    /**
     * Create a new Ancestor Reference Data instance
     *
     * @param  string|null  $categoryId  The unique identifier of the ancestor category
     * @param  string|null  $categoryName  The name of the ancestor category
     * @param  string|null  $categorySubtreeNodeHref  The href to retrieve the subtree of this ancestor
     * @param  int|null  $categoryTreeNodeLevel  The level of this ancestor in the tree hierarchy
     */
    public function __construct(
        public ?string $categoryId = null,
        public ?string $categoryName = null,
        public ?string $categorySubtreeNodeHref = null,
        public ?int $categoryTreeNodeLevel = null,
    ) {}
}
