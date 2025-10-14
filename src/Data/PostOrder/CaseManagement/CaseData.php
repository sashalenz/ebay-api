<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\PostOrder\CaseManagement;

use Spatie\LaravelData\Data;

/**
 * Case Data
 *
 * Contains details about a case (dispute) between buyer and seller.
 */
class CaseData extends Data
{
    public function __construct(
        public ?string $caseId,
        public ?string $caseType,
        public ?string $caseStatus,
        public ?string $buyerUserId,
        public ?string $sellerUserId,
        public ?string $itemId,
        public ?string $transactionId,
        public ?string $orderId,
        public ?string $creationDate,
        public ?string $lastModifiedDate,
        public ?string $respondByDate,
        public ?CaseDetailData $detail,
    ) {}
}
