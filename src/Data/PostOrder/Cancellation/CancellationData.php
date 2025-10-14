<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\PostOrder\Cancellation;

use Spatie\LaravelData\Data;

/**
 * Cancellation Data
 *
 * Contains details about an order cancellation request.
 */
class CancellationData extends Data
{
    public function __construct(
        public ?string $cancelId,
        public ?string $cancelState,
        public ?string $buyerUserId,
        public ?string $sellerUserId,
        public ?string $cancelReason,
        public ?string $cancelRequestor,
        public ?string $creationDate,
        public ?string $lastModifiedDate,
        public ?CancelRequestData $cancelRequest,
    ) {}
}
