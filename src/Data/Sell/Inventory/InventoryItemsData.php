<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Inventory Items Response Data
 *
 * Represents the response from getInventoryItems method.
 */
class InventoryItemsData extends Data
{
    public function __construct(
        #[DataCollectionOf(InventoryItemData::class)]
        public ?DataCollection $inventoryItems = null,
        public ?int $total = null,
        public ?string $href = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?int $offset = null,
        public ?string $prev = null,
    ) {}
}
