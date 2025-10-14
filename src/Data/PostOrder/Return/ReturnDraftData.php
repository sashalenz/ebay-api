<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\PostOrder\Return;

use Spatie\LaravelData\Data;

/**
 * Return Draft Data
 *
 * Contains draft return request information.
 */
class ReturnDraftData extends Data
{
    public function __construct(
        public ?string $draftId,
        public ?string $returnReason,
        public ?string $comments,
        public ?string $itemId,
        public ?string $transactionId,
    ) {}
}
