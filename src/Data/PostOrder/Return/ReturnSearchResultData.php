<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\PostOrder\Return;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Return Search Result Data
 *
 * Contains paginated search results for returns.
 */
class ReturnSearchResultData extends Data
{
    public function __construct(
        #[DataCollectionOf(ReturnData::class)]
        public ?DataCollection $returns,
        public ?string $href,
        public ?int $limit,
        public ?string $next,
        public ?int $offset,
        public ?string $prev,
        public ?int $total,
    ) {}
}
