<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Bulk Migrate Listing Response Data
 *
 * Response from bulk migrate listing operation.
 */
class BulkMigrateListingResponseData extends Data
{
    public function __construct(
        #[DataCollectionOf(MigrationData::class)]
        public ?DataCollection $responses = null,
    ) {}
}
