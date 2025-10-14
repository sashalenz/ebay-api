<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Data;

/**
 * Compatibility Property Value Data
 *
 * Represents a compatible vehicle property value.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:CompatibilityPropertyValue
 */
class CompatibilityPropertyValueData extends Data
{
    /**
     * Create a new Compatibility Property Value Data instance
     *
     * @param  string|null  $value  The compatible vehicle property value
     */
    public function __construct(
        public ?string $value = null,
    ) {}
}
