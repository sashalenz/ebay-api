<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Publish Response Data
 *
 * Response from publishing an offer.
 */
class PublishResponseData extends Data
{
    public function __construct(
        public ?string $listingId = null,
        public ?array $warnings = null,
        public ?array $errors = null,
    ) {}
}
