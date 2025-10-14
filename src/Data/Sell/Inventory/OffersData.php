<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Offers Data
 *
 * Collection of offers with pagination.
 */
class OffersData extends Data
{
    public function __construct(
        #[DataCollectionOf(OfferData::class)]
        public ?DataCollection $offers = null,
        public ?int $total = null,
        public ?int $size = null,
        public ?string $href = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?int $offset = null,
        public ?string $prev = null,
    ) {}
}
