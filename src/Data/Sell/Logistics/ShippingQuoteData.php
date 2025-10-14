<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Logistics;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Shipping Quote Data
 *
 * Shipping quote with live rates from carriers.
 */
class ShippingQuoteData extends Data
{
    public function __construct(
        public ?string $shippingQuoteId = null,
        public ?string $expirationDate = null,
        public ?array $orders = null,
        public ?array $packageSpecification = null,
        #[DataCollectionOf(RateData::class)]
        public ?DataCollection $rates = null,
        public ?array $shipFrom = null,
        public ?array $shipTo = null,
        public ?array $warnings = null,
    ) {}
}
