<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Account;

use Spatie\LaravelData\Data;

/**
 * Return Policy Data
 *
 * Return policy information.
 */
class ReturnPolicyData extends Data
{
    public function __construct(
        public ?string $returnPolicyId = null,
        public ?string $marketplaceId = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?bool $extendedHolidayReturnsOffered = null,
        public ?array $internationalOverride = null,
        public ?bool $refundMethod = null,
        public ?bool $restockingFeePercentage = null,
        public ?string $returnInstructions = null,
        public ?string $returnMethod = null,
        public ?array $returnPeriod = null,
        public ?bool $returnsAccepted = null,
        public ?string $returnShippingCostPayer = null,
        public ?array $categoryTypes = null,
    ) {}
}
