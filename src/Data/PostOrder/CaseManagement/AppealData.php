<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\PostOrder\CaseManagement;

use Spatie\LaravelData\Data;

/**
 * Appeal Data
 *
 * Contains appeal information for a case decision.
 */
class AppealData extends Data
{
    public function __construct(
        public ?string $appealReason,
        public ?string $comments,
    ) {}
}
