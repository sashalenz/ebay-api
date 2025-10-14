<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\PostOrder\Inquiry;

use Spatie\LaravelData\Data;

/**
 * Inquiry Data
 *
 * Contains details about an inquiry between buyer and seller.
 */
class InquiryData extends Data
{
    public function __construct(
        public ?string $inquiryId,
        public ?string $inquiryStatus,
        public ?string $buyerUserId,
        public ?string $sellerUserId,
        public ?string $itemId,
        public ?string $transactionId,
        public ?string $orderId,
        public ?string $creationDate,
        public ?string $lastModifiedDate,
        public ?string $respondByDate,
        public ?string $inquirySubject,
        public ?string $comments,
    ) {}
}
