<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Account;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Return Policies Data
 *
 * Collection of return policies.
 */
class ReturnPoliciesData extends Data
{
    public function __construct(
        #[DataCollectionOf(ReturnPolicyData::class)]
        public ?DataCollection $returnPolicies = null,
        public ?int $total = null,
    ) {}
}
