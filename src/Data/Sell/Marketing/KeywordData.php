<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Marketing;

use Spatie\LaravelData\Data;

/**
 * Keyword Data
 *
 * Keyword for PLA campaigns.
 */
class KeywordData extends Data
{
    public function __construct(
        public ?string $keywordId = null,
        public ?string $keywordText = null,
        public ?string $matchType = null,
        public ?array $bid = null,
        public ?string $keywordStatus = null,
    ) {}
}
