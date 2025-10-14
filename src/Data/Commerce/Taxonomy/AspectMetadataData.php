<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Aspect Metadata Data
 *
 * Represents aspect metadata for a specific category.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_tree/methods/getItemAspectsForCategory
 */
class AspectMetadataData extends Data
{
    /**
     * Create a new Aspect Metadata Data instance
     *
     * @param  DataCollection<int, AspectData>|null  $aspects  List of aspects for the category
     */
    public function __construct(
        #[DataCollectionOf(AspectData::class)]
        public ?DataCollection $aspects = null,
    ) {}
}
