<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Inventory Item Group Data
 *
 * Represents a group of related inventory items (variations).
 */
class InventoryItemGroupData extends Data
{
    public function __construct(
        public ?string $inventoryItemGroupKey = null,
        public ?array $aspects = null,
        public ?string $description = null,
        public ?array $imageUrls = null,
        public ?string $subtitle = null,
        public ?string $title = null,
        public ?VariesByData $variesBy = null,
        public ?array $variantSKUs = null,
        public ?string $videoIds = null,
    ) {}
}
