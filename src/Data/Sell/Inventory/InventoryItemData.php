<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Sashalenz\EbayApi\Enums\Condition;
use Sashalenz\EbayApi\Enums\Locale;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Inventory Item Data
 *
 * Represents a complete inventory item from the eBay Sell Inventory API.
 */
class InventoryItemData extends Data
{
    public function __construct(
        public ?string $sku = null,
        public ?ProductData $product = null,
        public ?AvailabilityData $availability = null,
        public ?Condition $condition = null,
        public ?string $conditionDescription = null,
        #[DataCollectionOf(ConditionDescriptorData::class)]
        public ?DataCollection $conditionDescriptors = null,
        public ?array $groupIds = null,
        public ?array $inventoryItemGroupKeys = null,
        public ?Locale $locale = null,
        public ?PackageWeightAndSizeData $packageWeightAndSize = null,
    ) {}
}
