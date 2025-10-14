<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Finances;

use Spatie\LaravelData\Data;

/**
 * Payout Data
 *
 * Seller payout information.
 */
class PayoutData extends Data
{
    public function __construct(
        public ?string $payoutId = null,
        public ?string $payoutDate = null,
        public ?array $amount = null,
        public ?string $payoutStatus = null,
        public ?string $payoutStatusDescription = null,
        public ?int $transactionCount = null,
        public ?string $lastAttemptedPayoutDate = null,
        public ?array $payoutInstrument = null,
    ) {}
}
