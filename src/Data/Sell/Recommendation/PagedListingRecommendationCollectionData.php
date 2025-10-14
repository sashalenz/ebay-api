<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Recommendation;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Paged Listing Recommendation Collection Data
 *
 * Collection of listing recommendations with pagination.
 */
class PagedListingRecommendationCollectionData extends Data
{
    public function __construct(
        #[DataCollectionOf(ListingRecommendationData::class)]
        public ?DataCollection $listingRecommendations = null,
        public ?string $href = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?int $offset = null,
        public ?string $prev = null,
        public ?int $total = null,
    ) {}
}
