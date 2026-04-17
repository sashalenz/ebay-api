<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class InventoryItemsData extends Data
{
    public function __construct(
        public ?int $total = null,
        #[DataCollectionOf(InventoryItemData::class)]
        public ?DataCollection $inventoryItems = null,
    ) {}
}
