<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Compatibility Data
 *
 * Represents a single compatibility entry.
 */
class CompatibilityData extends Data
{
    public function __construct(
        #[DataCollectionOf(NameValueData::class)]
        public ?DataCollection $compatibilityProperties = null,
        public ?string $notes = null,
    ) {}
}
