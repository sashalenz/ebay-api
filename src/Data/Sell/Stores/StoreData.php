<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Stores;

use Sashalenz\EbayApi\Enums\StoreSubscriptionLevel;
use Spatie\LaravelData\Data;

/**
 * Store Data
 *
 * Configuration information for a seller's eBay store.
 */
class StoreData extends Data
{
    public function __construct(
        public ?string $storeId = null,
        public ?string $storeName = null,
        public ?string $storeUrl = null,
        public ?StoreSubscriptionLevel $subscriptionLevel = null,
        public ?string $status = null,
    ) {}
}
