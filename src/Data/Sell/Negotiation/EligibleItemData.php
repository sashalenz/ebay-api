<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Negotiation;

use Spatie\LaravelData\Data;

/**
 * Eligible Item Data
 *
 * Item eligible for seller-initiated discount offer.
 */
class EligibleItemData extends Data
{
    public function __construct(
        public ?string $listingId = null,
        public ?int $eligibleQuantity = null,
        public ?array $soldQuantity = null,
    ) {}
}
