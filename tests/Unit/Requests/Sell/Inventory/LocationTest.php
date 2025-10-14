<?php

declare(strict_types=1);

use Sashalenz\EbayApi\Data\Sell\Inventory\InventoryLocationData;
use Sashalenz\EbayApi\Data\Sell\Inventory\InventoryLocationsData;
use Sashalenz\EbayApi\Data\Sell\Inventory\LocationData;
use Sashalenz\EbayApi\Data\Sell\Inventory\OperatingHoursData;
use Sashalenz\EbayApi\Exceptions\ValidationException;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Location\CreateInventoryLocationRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Location\DeleteInventoryLocationRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Location\DisableInventoryLocationRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Location\EnableInventoryLocationRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Location\GetInventoryLocationRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Location\GetInventoryLocationsRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Location\UpdateInventoryLocationRequest;

// GetInventoryLocationRequest Tests
test('GetInventoryLocationRequest builds correct endpoint', function () {
    $request = GetInventoryLocationRequest::make('warehouse-01');

    expect($request->endpoint())->toBe('/sell/inventory/v1/location/warehouse-01');
    expect($request->method())->toBe('GET');
    expect($request->dto())->toBe(InventoryLocationData::class);
});

test('GetInventoryLocationRequest maps response to Data', function () {
    $mockResponse = test()->successResponse(test()->loadFixture('InventoryLocationResponse.json'));
    $client = test()->createMockClient([$mockResponse]);

    $request = new GetInventoryLocationRequest($client, 'warehouse-01');
    $data = $request->asData();

    expect($data)->toBeInstanceOf(InventoryLocationData::class);
    expect($data->merchantLocationKey)->toBe('warehouse-01');
});

// GetInventoryLocationsRequest Tests
test('GetInventoryLocationsRequest supports pagination', function () {
    $request = GetInventoryLocationsRequest::make()
        ->limit(100)
        ->offset(50);

    expect($request->query())->toBe(['limit' => 100, 'offset' => 50]);
    expect($request->dto())->toBe(InventoryLocationsData::class);
});

// CreateInventoryLocationRequest Tests
test('CreateInventoryLocationRequest validates required fields', function () {
    $request = CreateInventoryLocationRequest::make('warehouse-01');

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class);
});

test('CreateInventoryLocationRequest validates name is required', function () {
    $request = CreateInventoryLocationRequest::make('warehouse-01')
        ->location(LocationData::from(['address' => ['city' => 'Test']]))
        ->addLocationType('WAREHOUSE');

    $errors = [];
    try {
        $request->send();
    } catch (ValidationException $e) {
        $errors = $e->getErrors();
    }

    expect($errors)->toContain('Location name is required');
});

test('CreateInventoryLocationRequest Builder Pattern builds correct body', function () {
    $request = CreateInventoryLocationRequest::make('warehouse-test')
        ->name('Test Warehouse')
        ->phone('+1234567890')
        ->location(LocationData::from(['address' => ['city' => 'San Jose', 'country' => 'US']]))
        ->addLocationType('WAREHOUSE')
        ->addLocationType('STORE')
        ->locationWebUrl('https://example.com')
        ->addOperatingHours(OperatingHoursData::from(['dayOfWeekEnum' => 'MONDAY']));

    $body = $request->body();

    expect($body['name'])->toBe('Test Warehouse');
    expect($body['phone'])->toBe('+1234567890');
    expect($body['locationTypes'])->toHaveCount(2);
    expect($body['locationWebUrl'])->toBe('https://example.com');
    expect($body['operatingHours'])->toHaveCount(1);
});

// UpdateInventoryLocationRequest Tests
test('UpdateInventoryLocationRequest Builder Pattern works', function () {
    $request = UpdateInventoryLocationRequest::make('warehouse-01')
        ->name('Updated Name')
        ->phone('+9876543210');

    $body = $request->body();

    expect($body['name'])->toBe('Updated Name');
    expect($body['phone'])->toBe('+9876543210');
    expect($request->endpoint())->toContain('/update_location_details');
});

// DeleteInventoryLocationRequest Tests
test('DeleteInventoryLocationRequest builds correct endpoint', function () {
    $request = DeleteInventoryLocationRequest::make('warehouse-01');

    expect($request->endpoint())->toBe('/sell/inventory/v1/location/warehouse-01');
    expect($request->method())->toBe('DELETE');
});

// EnableInventoryLocationRequest Tests
test('EnableInventoryLocationRequest builds correct endpoint', function () {
    $request = EnableInventoryLocationRequest::make('warehouse-01');

    expect($request->endpoint())->toBe('/sell/inventory/v1/location/warehouse-01/enable');
    expect($request->method())->toBe('POST');
});

// DisableInventoryLocationRequest Tests
test('DisableInventoryLocationRequest builds correct endpoint', function () {
    $request = DisableInventoryLocationRequest::make('warehouse-01');

    expect($request->endpoint())->toBe('/sell/inventory/v1/location/warehouse-01/disable');
    expect($request->method())->toBe('POST');
});
