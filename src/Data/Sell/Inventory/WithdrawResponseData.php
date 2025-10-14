<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Withdraw Response Data
 *
 * Response from withdrawing an offer.
 */
class WithdrawResponseData extends Data
{
    public function __construct(
        public ?string $listingId = null,
        public ?array $warnings = null,
    ) {}
}
