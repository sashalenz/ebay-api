<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\PostOrder\Return;

use Spatie\LaravelData\Data;

/**
 * Return Request Data
 *
 * Contains return request details.
 */
class ReturnRequestData extends Data
{
    public function __construct(
        public ?string $returnReason,
        public ?string $returnReasonMessage,
        public ?string $comments,
        public ?string $preferredResolution,
    ) {}
}
