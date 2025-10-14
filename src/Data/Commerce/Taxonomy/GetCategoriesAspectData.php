<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Get Categories Aspect Response Data
 *
 * Represents the response from fetchItemAspects method.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_tree/methods/fetchItemAspects
 */
class GetCategoriesAspectData extends Data
{
    /**
     * Create a new Get Categories Aspect Data instance
     *
     * @param  string|null  $categoryTreeId  The unique identifier of the eBay category tree
     * @param  string|null  $categoryTreeVersion  The version of the category tree
     * @param  DataCollection<int, CategoryAspectData>|null  $categoryAspects  Array of aspects for leaf categories
     */
    public function __construct(
        public ?string $categoryTreeId = null,
        public ?string $categoryTreeVersion = null,
        #[DataCollectionOf(CategoryAspectData::class)]
        public ?DataCollection $categoryAspects = null,
    ) {}
}
