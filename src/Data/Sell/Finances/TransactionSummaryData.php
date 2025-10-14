<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Finances;

use Spatie\LaravelData\Data;

/**
 * Transaction Summary Data
 *
 * Summary of monetary transactions.
 */
class TransactionSummaryData extends Data
{
    public function __construct(
        public ?int $transactionCount = null,
        public ?array $creditCount = null,
        public ?array $creditAmount = null,
        public ?array $debitCount = null,
        public ?array $debitAmount = null,
    ) {}
}
