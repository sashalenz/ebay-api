<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Migration Data
 *
 * Information about a migrated listing.
 */
class MigrationData extends Data
{
    public function __construct(
        public ?string $listingId = null,
        public ?string $sku = null,
        public ?int $statusCode = null,
        public ?string $message = null,
    ) {}
}
