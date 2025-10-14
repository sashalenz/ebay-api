<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Account;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Custom Policies Data
 *
 * Collection of custom policies.
 */
class CustomPoliciesData extends Data
{
    public function __construct(
        #[DataCollectionOf(CustomPolicyData::class)]
        public ?DataCollection $customPolicies = null,
        public ?int $total = null,
    ) {}
}
