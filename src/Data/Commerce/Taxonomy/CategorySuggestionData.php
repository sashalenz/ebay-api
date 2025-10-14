<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Commerce\Taxonomy;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Category Suggestion Data
 *
 * Represents a category suggestion from the eBay Commerce Taxonomy API.
 * Contains details about a suggested category and its relevancy to the search query.
 *
 * @see https://developer.ebay.com/api-docs/commerce/taxonomy/resources/category_suggestion/methods/getCategorySuggestions
 */
class CategorySuggestionData extends Data
{
    /**
     * Create a new Category Suggestion Data instance
     *
     * @param  CategoryData|null  $category  Details about the suggested category
     * @param  DataCollection<int, AncestorReferenceData>|null  $categoryTreeNodeAncestors  Array of ancestor categories from root to parent
     * @param  int|null  $categoryTreeNodeLevel  The absolute level of the category in the tree hierarchy
     * @param  string|null  $relevancy  The relevancy indicator (HIGH, MEDIUM, LOW)
     */
    public function __construct(
        public ?CategoryData $category = null,
        #[DataCollectionOf(AncestorReferenceData::class)]
        public ?DataCollection $categoryTreeNodeAncestors = null,
        public ?int $categoryTreeNodeLevel = null,
        public ?string $relevancy = null,
    ) {}
}
