<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Aspect Value Data
 *
 * Represents a valid value for an aspect.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:AspectValue
 */
class AspectValueData extends Data
{
    /**
     * Create a new Aspect Value Data instance
     *
     * @param  string|null  $localizedValue  The localized value of this aspect
     * @param  DataCollection<int, ValueConstraintData>|null  $valueConstraints  List of dependencies that identify when this value is available
     */
    public function __construct(
        public ?string $localizedValue = null,
        #[DataCollectionOf(ValueConstraintData::class)]
        public ?DataCollection $valueConstraints = null,
    ) {}
}
