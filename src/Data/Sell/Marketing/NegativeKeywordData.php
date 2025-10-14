<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Marketing;

use Spatie\LaravelData\Data;

/**
 * Negative Keyword Data
 *
 * Negative keyword to exclude from PLA campaigns.
 */
class NegativeKeywordData extends Data
{
    public function __construct(
        public ?string $negativeKeywordId = null,
        public ?string $negativeKeywordText = null,
        public ?string $negativeKeywordMatchType = null,
        public ?string $negativeKeywordStatus = null,
    ) {}
}
