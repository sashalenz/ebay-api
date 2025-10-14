<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Finances;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Payouts Data
 *
 * Collection of seller payouts.
 */
class PayoutsData extends Data
{
    public function __construct(
        #[DataCollectionOf(PayoutData::class)]
        public ?DataCollection $payouts = null,
        public ?string $href = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?int $offset = null,
        public ?int $total = null,
    ) {}
}
