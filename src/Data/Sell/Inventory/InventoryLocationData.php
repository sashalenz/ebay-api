<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Sashalenz\EbayApi\Enums\MerchantLocationStatus;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Inventory Location Data
 *
 * Complete inventory location information.
 */
class InventoryLocationData extends Data
{
    public function __construct(
        public ?string $merchantLocationKey = null,
        public ?string $name = null,
        public ?string $phone = null,
        public ?LocationData $location = null,
        public ?string $locationTypes = null,
        public ?string $locationWebUrl = null,
        public ?string $locationInstructions = null,
        #[DataCollectionOf(OperatingHoursData::class)]
        public ?DataCollection $operatingHours = null,
        #[DataCollectionOf(SpecialHoursData::class)]
        public ?DataCollection $specialHours = null,
        public ?string $locationAdditionalInformation = null,
        public ?MerchantLocationStatus $merchantLocationStatus = null,
    ) {}
}
