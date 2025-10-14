<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Account;

use Spatie\LaravelData\Data;

/**
 * Custom Policy Data
 *
 * Custom policy information (Product Compliance or Takeback).
 */
class CustomPolicyData extends Data
{
    public function __construct(
        public ?string $customPolicyId = null,
        public ?string $label = null,
        public ?string $description = null,
        public ?string $policyType = null,
    ) {}
}
