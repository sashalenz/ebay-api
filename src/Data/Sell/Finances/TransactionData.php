<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Finances;

use Spatie\LaravelData\Data;

/**
 * Transaction Data
 *
 * Monetary transaction information.
 */
class TransactionData extends Data
{
    public function __construct(
        public ?string $transactionId = null,
        public ?string $transactionDate = null,
        public ?string $transactionType = null,
        public ?string $transactionStatus = null,
        public ?array $amount = null,
        public ?string $orderId = null,
        public ?string $salesRecordReference = null,
        public ?string $payoutId = null,
        public ?array $references = null,
    ) {}
}
