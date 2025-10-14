<?php

declare(strict_types=1);

use Sashalenz\EbayApi\Data\Commerce\Taxonomy\BaseCategoryTreeData;
use Sashalenz\EbayApi\Data\Commerce\Taxonomy\CategorySuggestionData;
use Sashalenz\EbayApi\Data\Commerce\Taxonomy\CategoryTreeData;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Requests\Commerce\Taxonomy\CategoryTree\FetchItemAspectsRequest;
use Sashalenz\EbayApi\Requests\Commerce\Taxonomy\CategoryTree\GetCategorySubtreeRequest;
use Sashalenz\EbayApi\Requests\Commerce\Taxonomy\CategoryTree\GetCategorySuggestionsRequest;
use Sashalenz\EbayApi\Requests\Commerce\Taxonomy\CategoryTree\GetCategoryTreeRequest;
use Sashalenz\EbayApi\Requests\Commerce\Taxonomy\CategoryTree\GetCompatibilityPropertiesRequest;
use Sashalenz\EbayApi\Requests\Commerce\Taxonomy\CategoryTree\GetCompatibilityPropertyValuesRequest;
use Sashalenz\EbayApi\Requests\Commerce\Taxonomy\CategoryTree\GetDefaultCategoryTreeIdRequest;
use Sashalenz\EbayApi\Requests\Commerce\Taxonomy\CategoryTree\GetExpiredCategoriesRequest;
use Sashalenz\EbayApi\Requests\Commerce\Taxonomy\CategoryTree\GetItemAspectsForCategoryRequest;

// GetDefaultCategoryTreeIdRequest Tests
test('GetDefaultCategoryTreeIdRequest uses MarketplaceId Enum', function () {
    $request = GetDefaultCategoryTreeIdRequest::make(MarketplaceId::EBAY_US);

    expect($request->endpoint())->toContain('EBAY_US');
    expect($request->method())->toBe('GET');
    expect($request->dto())->toBe(BaseCategoryTreeData::class);
});

test('GetDefaultCategoryTreeIdRequest builds correct endpoint for different marketplaces', function () {
    $requestUS = GetDefaultCategoryTreeIdRequest::make(MarketplaceId::EBAY_US);
    $requestGB = GetDefaultCategoryTreeIdRequest::make(MarketplaceId::EBAY_GB);
    $requestDE = GetDefaultCategoryTreeIdRequest::make(MarketplaceId::EBAY_DE);

    expect($requestUS->endpoint())->toContain('EBAY_US');
    expect($requestGB->endpoint())->toContain('EBAY_GB');
    expect($requestDE->endpoint())->toContain('EBAY_DE');
});

// GetCategorySuggestionsRequest Tests
test('GetCategorySuggestionsRequest builds correct endpoint with query', function () {
    $request = GetCategorySuggestionsRequest::make('0', 'iphone');

    expect($request->endpoint())->toBe('/commerce/taxonomy/v1/category_tree/0/get_category_suggestions');
    expect($request->method())->toBe('GET');
    expect($request->query())->toBe(['q' => 'iphone']);
});

test('GetCategorySuggestionsRequest returns collection dto key', function () {
    $request = GetCategorySuggestionsRequest::make('0', 'laptop');

    expect($request->dto())->toBe(CategorySuggestionData::class);
    expect($request->dtoKey())->toBe('categorySuggestions');
});

test('GetCategorySuggestionsRequest maps to DataCollection', function () {
    $mockResponse = test()->successResponse(test()->loadFixture('CategorySuggestionsResponse.json'));
    $client = test()->createMockClient([$mockResponse]);

    $request = new GetCategorySuggestionsRequest($client, '0', 'iphone');
    $data = $request->asData();

    expect($data)->toHaveCount(1);
    expect($data->first())->toBeInstanceOf(CategorySuggestionData::class);
});

// GetCategoryTreeRequest Tests
test('GetCategoryTreeRequest builds correct endpoint', function () {
    $request = GetCategoryTreeRequest::make('0');

    expect($request->endpoint())->toBe('/commerce/taxonomy/v1/category_tree/0');
    expect($request->method())->toBe('GET');
    expect($request->dto())->toBe(CategoryTreeData::class);
});

test('GetCategoryTreeRequest maps to recursive CategoryTreeData', function () {
    $mockResponse = test()->successResponse(test()->loadFixture('CategoryTreeResponse.json'));
    $client = test()->createMockClient([$mockResponse]);

    $request = new GetCategoryTreeRequest($client, '0');
    $data = $request->asData();

    expect($data)->toBeInstanceOf(CategoryTreeData::class);
    expect($data->categoryTreeId)->toBe('0');
    expect($data->rootCategoryNode)->not->toBeNull();
    expect($data->rootCategoryNode->childCategoryTreeNodes)->not->toBeEmpty();
});

// GetCategorySubtreeRequest Tests
test('GetCategorySubtreeRequest builds correct endpoint', function () {
    $request = GetCategorySubtreeRequest::make('0', '11450');

    expect($request->endpoint())->toBe('/commerce/taxonomy/v1/category_tree/0/get_category_subtree');
    expect($request->query())->toBe(['category_id' => '11450']);
});

// GetItemAspectsForCategoryRequest Tests
test('GetItemAspectsForCategoryRequest builds correct endpoint', function () {
    $request = GetItemAspectsForCategoryRequest::make('0', '139971');

    expect($request->endpoint())->toBe('/commerce/taxonomy/v1/category_tree/0/get_item_aspects_for_category');
    expect($request->query())->toBe(['category_id' => '139971']);
});

// FetchItemAspectsRequest Tests
test('FetchItemAspectsRequest uses gzip header', function () {
    $request = FetchItemAspectsRequest::make('0');

    $headers = $request->headers();

    expect($headers)->toHaveKey('Accept-Encoding');
    expect($headers['Accept-Encoding'])->toBe('application/gzip');
});

test('FetchItemAspectsRequest supports filter', function () {
    $request = FetchItemAspectsRequest::make('0')->filter('leaf_category_ids:{11450}');

    expect($request->query())->toBe(['filter' => 'leaf_category_ids:{11450}']);
});

// GetCompatibilityPropertiesRequest Tests
test('GetCompatibilityPropertiesRequest builds correct endpoint', function () {
    $request = GetCompatibilityPropertiesRequest::make('0', '33559');

    expect($request->endpoint())->toBe('/commerce/taxonomy/v1/category_tree/0/get_compatibility_properties');
    expect($request->query())->toBe(['category_id' => '33559']);
});

// GetCompatibilityPropertyValuesRequest Tests
test('GetCompatibilityPropertyValuesRequest supports filter method', function () {
    $request = GetCompatibilityPropertyValuesRequest::make('0', '33559', 'Year')
        ->filter('Year:2015');

    expect($request->query())->toHaveKey('filter');
    expect($request->query()['filter'])->toBe('Year:2015');
});

test('GetCompatibilityPropertyValuesRequest supports filters method', function () {
    $request = GetCompatibilityPropertyValuesRequest::make('0', '33559', 'Model')
        ->filters(['Year' => '2020', 'Make' => 'Toyota']);

    $query = $request->query();

    expect($query)->toHaveKey('filter');
    expect($query['filter'])->toContain('Year:2020');
    expect($query['filter'])->toContain('Make:Toyota');
});

// GetExpiredCategoriesRequest Tests
test('GetExpiredCategoriesRequest builds correct query parameters', function () {
    $request = GetExpiredCategoriesRequest::make('0', '1.1')
        ->limit(100)
        ->offset(50);

    $query = $request->query();

    expect($query['category_tree_version'])->toBe('1.1');
    expect($query['limit'])->toBe(100);
    expect($query['offset'])->toBe(50);
});
