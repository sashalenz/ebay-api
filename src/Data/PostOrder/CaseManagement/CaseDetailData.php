<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\PostOrder\CaseManagement;

use Spatie\LaravelData\Data;

/**
 * Case Detail Data
 *
 * Contains detailed information about a case.
 */
class CaseDetailData extends Data
{
    public function __construct(
        public ?string $caseSubject,
        public ?string $caseReason,
        public ?string $userMessage,
        public ?string $sellerResponse,
        public ?string $resolution,
    ) {}
}
