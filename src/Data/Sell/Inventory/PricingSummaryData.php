<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Pricing Summary Data
 *
 * Contains pricing information for an offer.
 */
class PricingSummaryData extends Data
{
    public function __construct(
        public ?AmountData $price = null,
        public ?AmountData $pricingVisibility = null,
        public ?AmountData $originalRetailPrice = null,
        public ?AmountData $minimumAdvertisedPrice = null,
        public ?string $originallySoldForRetailPriceOn = null,
    ) {}
}
