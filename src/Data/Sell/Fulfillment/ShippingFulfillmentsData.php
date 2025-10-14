<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Fulfillment;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Shipping Fulfillments Data
 *
 * Collection of shipping fulfillments.
 */
class ShippingFulfillmentsData extends Data
{
    public function __construct(
        #[DataCollectionOf(ShippingFulfillmentData::class)]
        public ?DataCollection $fulfillments = null,
    ) {}
}
