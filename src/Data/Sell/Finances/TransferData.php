<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Finances;

use Spatie\LaravelData\Data;

/**
 * Transfer Data
 *
 * Transfer transaction information where seller reimburses eBay.
 */
class TransferData extends Data
{
    public function __construct(
        public ?string $transferId = null,
        public ?string $transferDate = null,
        public ?array $amount = null,
        public ?string $transferStatus = null,
        public ?array $fundingSource = null,
    ) {}
}
