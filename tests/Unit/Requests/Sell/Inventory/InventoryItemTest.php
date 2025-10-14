<?php

declare(strict_types=1);

use Sashalenz\EbayApi\Data\Sell\Inventory\AvailabilityData;
use Sashalenz\EbayApi\Data\Sell\Inventory\InventoryItemData;
use Sashalenz\EbayApi\Data\Sell\Inventory\PricingSummaryData;
use Sashalenz\EbayApi\Data\Sell\Inventory\ProductData;
use Sashalenz\EbayApi\Enums\Condition;
use Sashalenz\EbayApi\Enums\Locale;
use Sashalenz\EbayApi\Exceptions\ValidationException;
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem\BulkCreateOrReplaceInventoryItemRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem\BulkGetInventoryItemRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem\BulkUpdatePriceQuantityRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem\CreateOrReplaceInventoryItemRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem\DeleteInventoryItemRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem\GetInventoryItemRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem\GetInventoryItemsRequest;
use Sashalenz\EbayApi\Tests\Factories\InventoryItemDataFactory;

// GetInventoryItemRequest Tests
test('GetInventoryItemRequest builds correct endpoint', function () {
    $request = GetInventoryItemRequest::make('TEST-SKU-001');

    expect($request->endpoint())->toBe('/sell/inventory/v1/inventory_item/TEST-SKU-001');
    expect($request->method())->toBe('GET');
});

test('GetInventoryItemRequest returns correct dto class', function () {
    $request = GetInventoryItemRequest::make('TEST-SKU-001');

    expect($request->dto())->toBe(InventoryItemData::class);
});

test('GetInventoryItemRequest can map response to Data', function () {
    $mockResponse = test()->successResponse(test()->loadFixture('InventoryItemResponse.json'));
    $client = test()->createMockClient([$mockResponse]);

    $request = new GetInventoryItemRequest($client, 'TEST-SKU-001');
    $response = $request->send();

    expect($response->successful())->toBeTrue();

    $data = $response->data(InventoryItemData::class);
    expect($data)->toBeInstanceOf(InventoryItemData::class);
    expect($data->sku)->toBe('TEST-SKU-001');
});

// GetInventoryItemsRequest Tests
test('GetInventoryItemsRequest builds correct endpoint with pagination', function () {
    $request = GetInventoryItemsRequest::make()
        ->limit(50)
        ->offset(10);

    expect($request->endpoint())->toBe('/sell/inventory/v1/inventory_item');
    expect($request->method())->toBe('GET');
    expect($request->query())->toBe(['limit' => 50, 'offset' => 10]);
});

test('GetInventoryItemsRequest can map paginated response', function () {
    $mockResponse = test()->successResponse(test()->loadFixture('InventoryItemsResponse.json'));
    $client = test()->createMockClient([$mockResponse]);

    $request = new GetInventoryItemsRequest($client);
    $data = $request->asData();

    expect($data->total)->toBe(2);
    expect($data->inventoryItems)->toHaveCount(2);
});

// CreateOrReplaceInventoryItemRequest Tests
test('CreateOrReplaceInventoryItemRequest throws ValidationException when product is missing', function () {
    $request = CreateOrReplaceInventoryItemRequest::make('TEST-SKU');

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'Product information is required');
});

test('CreateOrReplaceInventoryItemRequest throws ValidationException when condition is missing', function () {
    $request = CreateOrReplaceInventoryItemRequest::make('TEST-SKU')
        ->product(ProductData::from(['title' => 'Test']));

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class);
});

test('CreateOrReplaceInventoryItemRequest builds correct body with Builder Pattern', function () {
    $request = CreateOrReplaceInventoryItemRequest::make('TEST-SKU')
        ->product(ProductData::from(['title' => 'Test Product', 'brand' => 'Test Brand']))
        ->condition(Condition::NEW)
        ->locale(Locale::EN_US)
        ->availability(AvailabilityData::from(['shipToLocationAvailability' => ['quantity' => 10]]));

    $body = $request->body();

    expect($body)->toHaveKey('product');
    expect($body['product']['title'])->toBe('Test Product');
    expect($body['condition'])->toBe('NEW');
    expect($body['locale'])->toBe('en_US');
    expect($body['availability'])->toHaveKey('shipToLocationAvailability');
});

test('CreateOrReplaceInventoryItemRequest supports fluent interface', function () {
    $request = CreateOrReplaceInventoryItemRequest::make('TEST-SKU')
        ->product(ProductData::from(['title' => 'Test']))
        ->condition(Condition::NEW)
        ->conditionDescription('Brand new')
        ->addGroupId('group-1')
        ->addInventoryItemGroupKey('item-group-1');

    expect($request)->toBeInstanceOf(CreateOrReplaceInventoryItemRequest::class);
    expect($request->body())->toHaveKey('conditionDescription');
});

// DeleteInventoryItemRequest Tests
test('DeleteInventoryItemRequest builds correct endpoint', function () {
    $request = DeleteInventoryItemRequest::make('TEST-SKU');

    expect($request->endpoint())->toBe('/sell/inventory/v1/inventory_item/TEST-SKU');
    expect($request->method())->toBe('DELETE');
});

// BulkGetInventoryItemRequest Tests
test('BulkGetInventoryItemRequest validates minimum items', function () {
    $request = BulkGetInventoryItemRequest::make();

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'At least one SKU is required');
});

test('BulkGetInventoryItemRequest validates maximum items', function () {
    $request = BulkGetInventoryItemRequest::make();

    for ($i = 1; $i <= 26; $i++) {
        $request->addSku("SKU-{$i}");
    }

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'Maximum 25 SKUs allowed');
});

test('BulkGetInventoryItemRequest supports fluent interface with addSku', function () {
    $request = BulkGetInventoryItemRequest::make()
        ->addSku('SKU-001')
        ->addSku('SKU-002')
        ->addSku('SKU-003');

    $body = $request->body();

    expect($body['requests'])->toHaveCount(3);
    expect($body['requests'][0]['sku'])->toBe('SKU-001');
});

test('BulkGetInventoryItemRequest supports skus() method', function () {
    $request = BulkGetInventoryItemRequest::make()
        ->skus(['SKU-A', 'SKU-B', 'SKU-C']);

    $body = $request->body();

    expect($body['requests'])->toHaveCount(3);
});

// BulkCreateOrReplaceInventoryItemRequest Tests
test('BulkCreateOrReplaceInventoryItemRequest validates minimum items', function () {
    $request = BulkCreateOrReplaceInventoryItemRequest::make();

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'At least one inventory item is required');
});

test('BulkCreateOrReplaceInventoryItemRequest validates maximum items', function () {
    $request = BulkCreateOrReplaceInventoryItemRequest::make();

    for ($i = 1; $i <= 26; $i++) {
        $request->addRequest("SKU-{$i}", InventoryItemDataFactory::make());
    }

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'Maximum 25 inventory items allowed');
});

test('BulkCreateOrReplaceInventoryItemRequest builds correct body', function () {
    $item1 = InventoryItemDataFactory::make(['sku' => 'SKU-001']);
    $item2 = InventoryItemDataFactory::make(['sku' => 'SKU-002']);

    $request = BulkCreateOrReplaceInventoryItemRequest::make()
        ->addRequest('SKU-001', $item1)
        ->addRequest('SKU-002', $item2);

    $body = $request->body();

    expect($body['requests'])->toHaveCount(2);
    expect($body['requests'][0]['sku'])->toBe('SKU-001');
    expect($body['requests'][1]['sku'])->toBe('SKU-002');
});

// BulkUpdatePriceQuantityRequest Tests
test('BulkUpdatePriceQuantityRequest validates minimum items', function () {
    $request = BulkUpdatePriceQuantityRequest::make();

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'At least one update request is required');
});

test('BulkUpdatePriceQuantityRequest validates maximum items', function () {
    $request = BulkUpdatePriceQuantityRequest::make();

    $availability = AvailabilityData::from(['shipToLocationAvailability' => ['quantity' => 10]]);

    for ($i = 1; $i <= 26; $i++) {
        $request->addRequest("SKU-{$i}", $availability);
    }

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'Maximum 25 items allowed');
});

test('BulkUpdatePriceQuantityRequest builds correct body with Data objects', function () {
    $availability = AvailabilityData::from(['shipToLocationAvailability' => ['quantity' => 50]]);
    $pricing = PricingSummaryData::from(['price' => ['value' => '29.99', 'currency' => 'USD']]);

    $request = BulkUpdatePriceQuantityRequest::make()
        ->addRequest('SKU-001', $availability, $pricing)
        ->addRequest('SKU-002', $availability);

    $body = $request->body();

    expect($body['requests'])->toHaveCount(2);
    expect($body['requests'][0]['sku'])->toBe('SKU-001');
    expect($body['requests'][0])->toHaveKey('availability');
    expect($body['requests'][0])->toHaveKey('pricingSummary');
    expect($body['requests'][1])->toHaveKey('availability');
    expect($body['requests'][1])->not->toHaveKey('pricingSummary');
});
