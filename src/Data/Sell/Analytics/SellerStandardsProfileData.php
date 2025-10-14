<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Analytics;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Seller Standards Profile Data
 *
 * Contains seller performance profile information.
 */
class SellerStandardsProfileData extends Data
{
    public function __construct(
        public ?CycleData $cycle,
        public ?string $defaultProgram,
        #[DataCollectionOf(MetricData::class)]
        public ?DataCollection $metrics,
        public ?string $program,
        public ?StandardsProfileData $standardsProfile,
    ) {}
}
