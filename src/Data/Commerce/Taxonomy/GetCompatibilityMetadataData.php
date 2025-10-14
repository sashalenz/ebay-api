<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Get Compatibility Metadata Response Data
 *
 * Represents the response from getCompatibilityProperties method.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_tree/methods/getCompatibilityProperties
 */
class GetCompatibilityMetadataData extends Data
{
    /**
     * Create a new Get Compatibility Metadata Data instance
     *
     * @param  DataCollection<int, CompatibilityPropertyData>|null  $compatibilityProperties  Array of compatible vehicle properties
     */
    public function __construct(
        #[DataCollectionOf(CompatibilityPropertyData::class)]
        public ?DataCollection $compatibilityProperties = null,
    ) {}
}
