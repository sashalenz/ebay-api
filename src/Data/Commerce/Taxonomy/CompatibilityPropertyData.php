<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Data;

/**
 * Compatibility Property Data
 *
 * Represents a compatible vehicle property (Make, Model, Year, etc.).
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:CompatibilityProperty
 */
class CompatibilityPropertyData extends Data
{
    /**
     * Create a new Compatibility Property Data instance
     *
     * @param  string|null  $name  The actual name of the property (e.g., 'Make', 'Model', 'Year')
     * @param  string|null  $localizedName  The localized name of the property
     */
    public function __construct(
        public ?string $name = null,
        public ?string $localizedName = null,
    ) {}
}
