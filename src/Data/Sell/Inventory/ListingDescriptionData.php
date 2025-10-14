<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Listing Description Data
 *
 * The description of the listing.
 */
class ListingDescriptionData extends Data
{
    public function __construct(
        public ?string $listingDescription = null,
    ) {}
}
