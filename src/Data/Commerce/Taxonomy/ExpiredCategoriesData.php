<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Expired Categories Response Data
 *
 * Represents the response from getExpiredCategories method.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_tree/methods/getExpiredCategories
 */
class ExpiredCategoriesData extends Data
{
    /**
     * Create a new Expired Categories Data instance
     *
     * @param  DataCollection<int, ExpiredCategoryData>|null  $expiredCategories  Array of expired category mappings
     */
    public function __construct(
        #[DataCollectionOf(ExpiredCategoryData::class)]
        public ?DataCollection $expiredCategories = null,
    ) {}
}
