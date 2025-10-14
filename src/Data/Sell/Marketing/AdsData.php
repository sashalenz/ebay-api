<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Marketing;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Ads Data
 *
 * Collection of ads with pagination.
 */
class AdsData extends Data
{
    public function __construct(
        #[DataCollectionOf(AdData::class)]
        public ?DataCollection $ads = null,
        public ?string $href = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?int $offset = null,
        public ?string $prev = null,
        public ?int $total = null,
    ) {}
}
