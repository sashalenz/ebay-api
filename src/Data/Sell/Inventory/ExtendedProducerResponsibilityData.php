<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Spatie\LaravelData\Data;

/**
 * Extended Producer Responsibility Data
 *
 * EPR information for regulatory compliance.
 */
class ExtendedProducerResponsibilityData extends Data
{
    public function __construct(
        public ?string $producerProductId = null,
        public ?string $productDocumentationId = null,
        public ?string $productPackageId = null,
        public ?string $shipmentPackageId = null,
        public ?string $ecoParticipationFee = null,
    ) {}
}
