<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Translation;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Translation Data
 *
 * Contains translation results.
 */
class TranslationData extends Data
{
    public function __construct(
        public ?string $from,
        public ?string $to,
        #[DataCollectionOf(TranslatedTextData::class)]
        public ?DataCollection $translations,
    ) {}
}
