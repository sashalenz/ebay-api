<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Notification;

use Spatie\LaravelData\Data;

/**
 * Destination Data
 *
 * Notification destination endpoint information.
 */
class DestinationData extends Data
{
    public function __construct(
        public ?string $destinationId = null,
        public ?string $name = null,
        public ?string $status = null,
        public ?array $deliveryConfig = null,
    ) {}
}
