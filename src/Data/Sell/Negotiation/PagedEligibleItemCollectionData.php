<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Negotiation;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Paged Eligible Item Collection Data
 *
 * Collection of eligible items with pagination.
 */
class PagedEligibleItemCollectionData extends Data
{
    public function __construct(
        #[DataCollectionOf(EligibleItemData::class)]
        public ?DataCollection $eligibleItems = null,
        public ?string $href = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?int $offset = null,
        public ?string $prev = null,
        public ?int $total = null,
    ) {}
}
