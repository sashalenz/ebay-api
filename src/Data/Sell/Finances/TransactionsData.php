<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Finances;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Transactions Data
 *
 * Collection of monetary transactions.
 */
class TransactionsData extends Data
{
    public function __construct(
        #[DataCollectionOf(TransactionData::class)]
        public ?DataCollection $transactions = null,
        public ?string $href = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?int $offset = null,
        public ?int $total = null,
    ) {}
}
