<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Marketing;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Promotions Data
 *
 * Collection of promotions.
 */
class PromotionsData extends Data
{
    public function __construct(
        #[DataCollectionOf(PromotionData::class)]
        public ?DataCollection $promotions = null,
        public ?int $total = null,
    ) {}
}
