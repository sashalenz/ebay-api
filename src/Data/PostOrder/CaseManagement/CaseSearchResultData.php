<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\PostOrder\CaseManagement;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Case Search Result Data
 *
 * Contains paginated search results for cases.
 */
class CaseSearchResultData extends Data
{
    public function __construct(
        #[DataCollectionOf(CaseData::class)]
        public ?DataCollection $cases,
        public ?string $href,
        public ?int $limit,
        public ?string $next,
        public ?int $offset,
        public ?string $prev,
        public ?int $total,
    ) {}
}
