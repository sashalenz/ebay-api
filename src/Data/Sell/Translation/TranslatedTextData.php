<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Translation;

use Spatie\LaravelData\Data;

/**
 * Translated Text Data
 *
 * Contains individual translation text.
 */
class TranslatedTextData extends Data
{
    public function __construct(
        public ?string $originalText,
        public ?string $translatedText,
    ) {}
}
