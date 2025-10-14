<?php

declare(strict_types=1);

use Sashalenz\EbayApi\Data\Sell\Stores\StoreCategoriesData;
use Sashalenz\EbayApi\Data\Sell\Stores\StoreData;
use Sashalenz\EbayApi\Data\Sell\Stores\StoreTaskData;
use Sashalenz\EbayApi\Data\Sell\Stores\StoreTasksData;
use Sashalenz\EbayApi\Exceptions\ValidationException;
use Sashalenz\EbayApi\Requests\Sell\Stores\AddStoreCategoryRequest;
use Sashalenz\EbayApi\Requests\Sell\Stores\DeleteStoreCategoryRequest;
use Sashalenz\EbayApi\Requests\Sell\Stores\GetStoreCategoriesRequest;
use Sashalenz\EbayApi\Requests\Sell\Stores\GetStoreRequest;
use Sashalenz\EbayApi\Requests\Sell\Stores\GetStoreTaskRequest;
use Sashalenz\EbayApi\Requests\Sell\Stores\GetStoreTasksRequest;
use Sashalenz\EbayApi\Requests\Sell\Stores\MoveStoreCategoryRequest;
use Sashalenz\EbayApi\Requests\Sell\Stores\RenameStoreCategoryRequest;

// GetStoreRequest Tests
test('GetStoreRequest builds correct endpoint', function () {
    $request = GetStoreRequest::make();

    expect($request->endpoint())->toBe('/sell/stores/v1/store');
    expect($request->method())->toBe('GET');
    expect($request->dto())->toBe(StoreData::class);
});

// GetStoreCategoriesRequest Tests
test('GetStoreCategoriesRequest supports pagination', function () {
    $request = GetStoreCategoriesRequest::make()
        ->limit(50)
        ->offset(10);

    expect($request->query())->toBe(['limit' => 50, 'offset' => 10]);
    expect($request->dto())->toBe(StoreCategoriesData::class);
});

// AddStoreCategoryRequest Tests
test('AddStoreCategoryRequest validates category name is required', function () {
    $request = AddStoreCategoryRequest::make('');

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'Category name is required');
});

test('AddStoreCategoryRequest validates category name max length', function () {
    $longName = str_repeat('a', 36);
    $request = AddStoreCategoryRequest::make($longName);

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'Category name cannot exceed 35 characters');
});

test('AddStoreCategoryRequest builds correct body', function () {
    $request = AddStoreCategoryRequest::make('Test Category')
        ->destinationParentCategoryId('123')
        ->listingDestinationCategoryId('456');

    $body = $request->body();

    expect($body['categoryName'])->toBe('Test Category');
    expect($body['destinationParentCategoryId'])->toBe('123');
    expect($body['listingDestinationCategoryId'])->toBe('456');
});

test('AddStoreCategoryRequest body with only required fields', function () {
    $request = AddStoreCategoryRequest::make('Test Category');

    $body = $request->body();

    expect($body)->toHaveKey('categoryName');
    expect($body)->not->toHaveKey('destinationParentCategoryId');
    expect($body)->not->toHaveKey('listingDestinationCategoryId');
});

// DeleteStoreCategoryRequest Tests
test('DeleteStoreCategoryRequest builds correct endpoint', function () {
    $request = DeleteStoreCategoryRequest::make('cat-123');

    expect($request->endpoint())->toBe('/sell/stores/v1/store/categories/cat-123');
    expect($request->method())->toBe('DELETE');
});

test('DeleteStoreCategoryRequest supports listingDestinationCategoryId query param', function () {
    $request = DeleteStoreCategoryRequest::make('cat-123')
        ->listingDestinationCategoryId('cat-456');

    expect($request->query())->toBe(['listing_destination_category_id' => 'cat-456']);
});

// RenameStoreCategoryRequest Tests
test('RenameStoreCategoryRequest validates category name', function () {
    $request = RenameStoreCategoryRequest::make('cat-123', '');

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'Category name is required');
});

test('RenameStoreCategoryRequest validates max length', function () {
    $longName = str_repeat('b', 36);
    $request = RenameStoreCategoryRequest::make('cat-123', $longName);

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'cannot exceed 35 characters');
});

test('RenameStoreCategoryRequest builds correct endpoint and body', function () {
    $request = RenameStoreCategoryRequest::make('cat-123', 'New Category Name');

    expect($request->endpoint())->toBe('/sell/stores/v1/store/categories/cat-123/rename');
    expect($request->method())->toBe('POST');
    expect($request->body())->toBe(['categoryName' => 'New Category Name']);
});

// MoveStoreCategoryRequest Tests
test('MoveStoreCategoryRequest builds correct endpoint', function () {
    $request = MoveStoreCategoryRequest::make('cat-123');

    expect($request->endpoint())->toBe('/sell/stores/v1/store/categories/cat-123/move');
    expect($request->method())->toBe('POST');
});

test('MoveStoreCategoryRequest builds body with parent category', function () {
    $request = MoveStoreCategoryRequest::make('cat-123')
        ->destinationParentCategoryId('cat-parent-456')
        ->listingDestinationCategoryId('cat-listings-789');

    $body = $request->body();

    expect($body['destinationParentCategoryId'])->toBe('cat-parent-456');
    expect($body['listingDestinationCategoryId'])->toBe('cat-listings-789');
});

// GetStoreTaskRequest Tests
test('GetStoreTaskRequest builds correct endpoint', function () {
    $request = GetStoreTaskRequest::make('task-123');

    expect($request->endpoint())->toBe('/sell/stores/v1/store/task/task-123');
    expect($request->method())->toBe('GET');
    expect($request->dto())->toBe(StoreTaskData::class);
});

// GetStoreTasksRequest Tests
test('GetStoreTasksRequest supports pagination', function () {
    $request = GetStoreTasksRequest::make()
        ->limit(25)
        ->offset(5);

    expect($request->query())->toBe(['limit' => 25, 'offset' => 5]);
    expect($request->dto())->toBe(StoreTasksData::class);
});
