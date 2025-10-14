<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Listing Policies Data
 *
 * Contains the IDs of the eBay business policies.
 */
class ListingPoliciesData extends Data
{
    public function __construct(
        public ?string $fulfillmentPolicyId = null,
        public ?string $paymentPolicyId = null,
        public ?string $returnPolicyId = null,
        public ?string $shippingCostOverrides = null,
    ) {}
}
