<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Data;

/**
 * Value Constraint Data
 *
 * Represents constraints on aspect values based on control aspects.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:ValueConstraint
 */
class ValueConstraintData extends Data
{
    /**
     * Create a new Value Constraint Data instance
     *
     * @param  string|null  $applicableForLocalizedAspectName  The name of the control aspect
     * @param  array<string>|null  $applicableForLocalizedAspectValues  Values of the control aspect
     */
    public function __construct(
        public ?string $applicableForLocalizedAspectName = null,
        public ?array $applicableForLocalizedAspectValues = null,
    ) {}
}
