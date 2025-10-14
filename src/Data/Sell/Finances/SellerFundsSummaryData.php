<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Finances;

use Spatie\LaravelData\Data;

/**
 * Seller Funds Summary Data
 *
 * Summary of pending seller funds.
 */
class SellerFundsSummaryData extends Data
{
    public function __construct(
        public ?array $totalBalance = null,
        public ?array $availableFunds = null,
        public ?array $fundsOnHold = null,
        public ?array $processingFunds = null,
    ) {}
}
