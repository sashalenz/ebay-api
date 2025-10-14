<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Inventory Locations Data
 *
 * Collection of inventory locations with pagination.
 */
class InventoryLocationsData extends Data
{
    public function __construct(
        #[DataCollectionOf(InventoryLocationData::class)]
        public ?DataCollection $locations = null,
        public ?int $total = null,
        public ?string $href = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?int $offset = null,
        public ?string $prev = null,
    ) {}
}
