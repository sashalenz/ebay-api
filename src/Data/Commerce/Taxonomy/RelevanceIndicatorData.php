<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Data;

/**
 * Relevance Indicator Data
 *
 * Indicates the relevance of an aspect based on search data.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/types/txn:RelevanceIndicator
 */
class RelevanceIndicatorData extends Data
{
    /**
     * Create a new Relevance Indicator Data instance
     *
     * @param  int|null  $searchCount  The number of recent searches (30 days) for the aspect
     */
    public function __construct(
        public ?int $searchCount = null,
    ) {}
}
