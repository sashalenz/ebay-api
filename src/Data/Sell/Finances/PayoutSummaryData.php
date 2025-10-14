<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Finances;

use Spatie\LaravelData\Data;

/**
 * Payout Summary Data
 *
 * Summary of seller payouts and transactions.
 */
class PayoutSummaryData extends Data
{
    public function __construct(
        public ?int $payoutCount = null,
        public ?array $totalAmount = null,
        public ?int $totalTransactionCount = null,
    ) {}
}
