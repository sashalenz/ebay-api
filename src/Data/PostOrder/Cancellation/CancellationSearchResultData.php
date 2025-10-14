<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\PostOrder\Cancellation;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Cancellation Search Result Data
 *
 * Contains paginated search results for cancellations.
 */
class CancellationSearchResultData extends Data
{
    public function __construct(
        #[DataCollectionOf(CancellationData::class)]
        public ?DataCollection $cancellations,
        public ?string $href,
        public ?int $limit,
        public ?string $next,
        public ?int $offset,
        public ?string $prev,
        public ?int $total,
    ) {}
}
