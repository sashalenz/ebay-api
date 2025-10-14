<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Account;

use Spatie\LaravelData\Data;

/**
 * Fulfillment Policy Data
 *
 * Fulfillment (shipping) policy information.
 */
class FulfillmentPolicyData extends Data
{
    public function __construct(
        public ?string $fulfillmentPolicyId = null,
        public ?string $marketplaceId = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?bool $freightShipping = null,
        public ?bool $globalShipping = null,
        public ?bool $localPickup = null,
        public ?array $pickupDropOff = null,
        public ?array $shippingOptions = null,
        public ?array $shipToLocations = null,
        public ?string $categoryTypes = null,
        public ?string $handlingTime = null,
    ) {}
}
