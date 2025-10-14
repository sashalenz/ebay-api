<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Fulfillment;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Shipping Fulfillment Data
 *
 * Shipping fulfillment information.
 */
class ShippingFulfillmentData extends Data
{
    public function __construct(
        public ?string $fulfillmentId = null,
        #[DataCollectionOf(LineItemData::class)]
        public ?DataCollection $lineItems = null,
        public ?string $shipmentTrackingNumber = null,
        public ?string $shippingCarrierCode = null,
        public ?string $shippedDate = null,
        public ?string $shippingServiceCode = null,
    ) {}
}
