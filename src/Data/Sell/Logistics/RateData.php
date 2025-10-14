<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Logistics;

use Spatie\LaravelData\Data;

/**
 * Rate Data
 *
 * Shipping rate information from a carrier.
 */
class RateData extends Data
{
    public function __construct(
        public ?string $rateId = null,
        public ?string $rateRecommendation = null,
        public ?array $baseShippingCost = null,
        public ?array $additionalShippingOptions = null,
        public ?array $destinationTimeZone = null,
        public ?array $maxEstimatedDeliveryDate = null,
        public ?array $minEstimatedDeliveryDate = null,
        public ?string $shippingCarrierCode = null,
        public ?string $shippingCarrierName = null,
        public ?string $shippingQuoteId = null,
        public ?string $shippingServiceCode = null,
        public ?string $shippingServiceName = null,
    ) {}
}
