<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Sashalenz\EbayApi\Enums\AspectAdvancedDataType;
use Sashalenz\EbayApi\Enums\AspectApplicableTo;
use Sashalenz\EbayApi\Enums\AspectDataType;
use Sashalenz\EbayApi\Enums\AspectMode;
use Sashalenz\EbayApi\Enums\AspectUsage;
use Sashalenz\EbayApi\Enums\ItemToAspectCardinality;
use Spatie\LaravelData\Data;

/**
 * Aspect Constraint Data
 *
 * Information about the formatting, occurrence, and support of an aspect.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:AspectConstraint
 */
class AspectConstraintData extends Data
{
    /**
     * Create a new Aspect Constraint Data instance
     *
     * @param  array<AspectApplicableTo>|null  $aspectApplicableTo  Indicates if aspect is for item or product
     * @param  AspectDataType|null  $aspectDataType  The data type of the aspect value
     * @param  bool|null  $aspectEnabledForVariations  Indicates if aspect can be used for variations
     * @param  string|null  $aspectFormat  The format of the aspect value
     * @param  int|null  $aspectMaxLength  Maximum length for the aspect value
     * @param  AspectMode|null  $aspectMode  How values must be specified (free text or selection)
     * @param  bool|null  $aspectRequired  Indicates if this aspect is required
     * @param  AspectUsage|null  $aspectUsage  Indicates if aspect is recommended or optional
     * @param  string|null  $expectedRequiredByDate  Expected date when aspect will be required
     * @param  ItemToAspectCardinality|null  $itemToAspectCardinality  Single or multiple values allowed
     * @param  AspectAdvancedDataType|null  $aspectAdvancedDataType  Additional data type requirements
     */
    public function __construct(
        public ?array $aspectApplicableTo = null,
        public ?AspectDataType $aspectDataType = null,
        public ?bool $aspectEnabledForVariations = null,
        public ?string $aspectFormat = null,
        public ?int $aspectMaxLength = null,
        public ?AspectMode $aspectMode = null,
        public ?bool $aspectRequired = null,
        public ?AspectUsage $aspectUsage = null,
        public ?string $expectedRequiredByDate = null,
        public ?ItemToAspectCardinality $itemToAspectCardinality = null,
        public ?AspectAdvancedDataType $aspectAdvancedDataType = null,
    ) {}
}
