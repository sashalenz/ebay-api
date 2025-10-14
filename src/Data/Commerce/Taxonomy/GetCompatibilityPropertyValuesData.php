<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Get Compatibility Property Values Response Data
 *
 * Represents the response from getCompatibilityPropertyValues method.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_tree/methods/getCompatibilityPropertyValues
 */
class GetCompatibilityPropertyValuesData extends Data
{
    /**
     * Create a new Get Compatibility Property Values Data instance
     *
     * @param  DataCollection<int, CompatibilityPropertyValueData>|null  $compatibilityPropertyValues  Array of compatible vehicle property values
     */
    public function __construct(
        #[DataCollectionOf(CompatibilityPropertyValueData::class)]
        public ?DataCollection $compatibilityPropertyValues = null,
    ) {}
}
