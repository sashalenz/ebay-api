<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Logistics;

use Spatie\LaravelData\Data;

/**
 * Shipment Data
 *
 * Created shipment with tracking and label information.
 */
class ShipmentData extends Data
{
    public function __construct(
        public ?string $shipmentId = null,
        public ?string $shipmentTrackingNumber = null,
        public ?string $labelDownloadUrl = null,
        public ?string $labelCustomMessage = null,
        public ?array $orders = null,
        public ?array $packageSpecification = null,
        public ?array $rate = null,
        public ?array $shipFrom = null,
        public ?array $shipTo = null,
    ) {}
}
