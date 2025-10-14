<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\PostOrder\Return;

use Spatie\LaravelData\Data;

/**
 * Shipping Label Data
 *
 * Contains return shipping label information.
 */
class ShippingLabelData extends Data
{
    public function __construct(
        public ?string $labelId,
        public ?string $trackingNumber,
        public ?string $shippingCarrierName,
        public ?string $cost,
        public ?string $currency,
        public ?string $labelUrl,
    ) {}
}
