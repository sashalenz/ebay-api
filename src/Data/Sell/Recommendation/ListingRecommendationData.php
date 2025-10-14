<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Recommendation;

use Spatie\LaravelData\Data;

/**
 * Listing Recommendation Data
 *
 * Recommendation for optimizing a listing.
 */
class ListingRecommendationData extends Data
{
    public function __construct(
        public ?string $listingId = null,
        public ?string $recommendationType = null,
        public ?array $suggestedBidPercentages = null,
        public ?string $message = null,
    ) {}
}
