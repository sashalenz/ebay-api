<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\PostOrder\Inquiry;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Inquiry Search Result Data
 *
 * Contains paginated search results for inquiries.
 */
class InquirySearchResultData extends Data
{
    public function __construct(
        #[DataCollectionOf(InquiryData::class)]
        public ?DataCollection $inquiries,
        public ?string $href,
        public ?int $limit,
        public ?string $next,
        public ?int $offset,
        public ?string $prev,
        public ?int $total,
    ) {}
}
