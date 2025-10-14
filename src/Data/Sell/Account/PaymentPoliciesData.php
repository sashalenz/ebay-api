<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Account;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Payment Policies Data
 *
 * Collection of payment policies.
 */
class PaymentPoliciesData extends Data
{
    public function __construct(
        #[DataCollectionOf(PaymentPolicyData::class)]
        public ?DataCollection $paymentPolicies = null,
        public ?int $total = null,
    ) {}
}
