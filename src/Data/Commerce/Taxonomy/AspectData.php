<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Aspect Data
 *
 * Represents aspect metadata used to describe items in a category.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:Aspect
 */
class AspectData extends Data
{
    /**
     * Create a new Aspect Data instance
     *
     * @param  string|null  $localizedAspectName  The localized name of this aspect
     * @param  AspectConstraintData|null  $aspectConstraint  Information about the formatting and occurrence of this aspect
     * @param  DataCollection<int, AspectValueData>|null  $aspectValues  List of valid values for this aspect
     * @param  RelevanceIndicatorData|null  $relevanceIndicator  The relevance of this aspect (conditional, requires permission)
     */
    public function __construct(
        public ?string $localizedAspectName = null,
        public ?AspectConstraintData $aspectConstraint = null,
        #[DataCollectionOf(AspectValueData::class)]
        public ?DataCollection $aspectValues = null,
        public ?RelevanceIndicatorData $relevanceIndicator = null,
    ) {}
}
