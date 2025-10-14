<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Account;

use Spatie\LaravelData\Data;

/**
 * Payment Policy Data
 *
 * Payment policy information.
 */
class PaymentPolicyData extends Data
{
    public function __construct(
        public ?string $paymentPolicyId = null,
        public ?string $marketplaceId = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?array $paymentMethods = null,
        public ?bool $immediatePay = null,
        public ?array $categoryTypes = null,
        public ?array $depositDetails = null,
        public ?array $fullPaymentDueIn = null,
    ) {}
}
