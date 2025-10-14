<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\PostOrder\Cancellation;

use Spatie\LaravelData\Data;

/**
 * Cancel Request Data
 *
 * Contains cancellation request details.
 */
class CancelRequestData extends Data
{
    public function __construct(
        public ?string $cancelReason,
        public ?string $cancelReasonMessage,
        public ?string $legacyOrderId,
        public ?string $orderId,
    ) {}
}
