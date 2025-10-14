<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Analytics;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Find Seller Standards Profiles Response Data
 *
 * Response for finding seller standards profiles.
 */
class FindSellerStandardsProfilesResponseData extends Data
{
    public function __construct(
        #[DataCollectionOf(SellerStandardsProfileData::class)]
        public ?DataCollection $standardsProfiles,
    ) {}
}
