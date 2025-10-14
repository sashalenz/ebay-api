<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Marketing;

use Spatie\LaravelData\Data;

/**
 * Ad Data
 *
 * Promoted Listings ad information.
 */
class AdData extends Data
{
    public function __construct(
        public ?string $adId = null,
        public ?array $bidPercentage = null,
        public ?string $listingId = null,
        public ?array $inventoryReference = null,
        public ?string $adStatus = null,
    ) {}
}
