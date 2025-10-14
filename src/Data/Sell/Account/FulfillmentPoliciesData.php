<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Account;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Fulfillment Policies Data
 *
 * Collection of fulfillment policies.
 */
class FulfillmentPoliciesData extends Data
{
    public function __construct(
        #[DataCollectionOf(FulfillmentPolicyData::class)]
        public ?DataCollection $fulfillmentPolicies = null,
        public ?int $total = null,
    ) {}
}
