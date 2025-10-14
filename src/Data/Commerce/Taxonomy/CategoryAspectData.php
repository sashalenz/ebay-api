<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Category Aspect Data
 *
 * Represents aspects for a specific category.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:CategoryAspect
 */
class CategoryAspectData extends Data
{
    /**
     * Create a new Category Aspect Data instance
     *
     * @param  CategoryData|null  $category  The category details
     * @param  DataCollection<int, AspectData>|null  $aspects  List of aspect metadata for this category
     */
    public function __construct(
        public ?CategoryData $category = null,
        #[DataCollectionOf(AspectData::class)]
        public ?DataCollection $aspects = null,
    ) {}
}
