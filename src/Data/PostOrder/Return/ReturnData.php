<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\PostOrder\Return;

use Spatie\LaravelData\Data;

/**
 * Return Data
 *
 * Contains details about a return request.
 */
class ReturnData extends Data
{
    public function __construct(
        public ?string $returnId,
        public ?string $returnState,
        public ?string $buyerUserId,
        public ?string $sellerUserId,
        public ?string $returnReason,
        public ?string $returnType,
        public ?string $itemId,
        public ?string $transactionId,
        public ?string $orderId,
        public ?string $creationDate,
        public ?string $lastModifiedDate,
        public ?string $respondByDate,
        public ?ReturnRequestData $returnRequest,
    ) {}
}
