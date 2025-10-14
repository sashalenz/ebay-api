<?php

declare(strict_types=1);

use Sashalenz\EbayApi\Data\Sell\Inventory\CompatibilityData;
use Sashalenz\EbayApi\Data\Sell\Inventory\NameValueData;
use Sashalenz\EbayApi\Data\Sell\Inventory\ProductCompatibilityData;
use Sashalenz\EbayApi\Exceptions\ValidationException;
use Sashalenz\EbayApi\Requests\Sell\Inventory\ProductCompatibility\CreateOrReplaceProductCompatibilityRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\ProductCompatibility\DeleteProductCompatibilityRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\ProductCompatibility\GetProductCompatibilityRequest;

// GetProductCompatibilityRequest Tests
test('GetProductCompatibilityRequest builds correct endpoint', function () {
    $request = GetProductCompatibilityRequest::make('SKU-123');

    expect($request->endpoint())->toBe('/sell/inventory/v1/inventory_item/SKU-123/product_compatibility');
    expect($request->method())->toBe('GET');
    expect($request->dto())->toBe(ProductCompatibilityData::class);
});

// CreateOrReplaceProductCompatibilityRequest Tests
test('CreateOrReplaceProductCompatibilityRequest validates minimum compatibility', function () {
    $request = CreateOrReplaceProductCompatibilityRequest::make('SKU-123');

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'At least one compatibility entry is required');
});

test('CreateOrReplaceProductCompatibilityRequest Builder Pattern works', function () {
    $compatibility1 = CompatibilityData::from([
        'compatibilityProperties' => [
            NameValueData::from(['name' => 'Year', 'value' => '2020']),
            NameValueData::from(['name' => 'Make', 'value' => 'Toyota']),
        ],
        'notes' => 'Fits 2020 Toyota Camry',
    ]);

    $compatibility2 = CompatibilityData::from([
        'compatibilityProperties' => [
            NameValueData::from(['name' => 'Year', 'value' => '2021']),
            NameValueData::from(['name' => 'Make', 'value' => 'Honda']),
        ],
    ]);

    $request = CreateOrReplaceProductCompatibilityRequest::make('SKU-123')
        ->addCompatibility($compatibility1)
        ->addCompatibility($compatibility2);

    $body = $request->body();

    expect($body['compatibility'])->toHaveCount(2);
    expect($body['compatibility'][0])->toHaveKey('compatibilityProperties');
    expect($body['compatibility'][0]['notes'])->toBe('Fits 2020 Toyota Camry');
});

test('CreateOrReplaceProductCompatibilityRequest supports compatibility() method', function () {
    $compatibilities = [
        CompatibilityData::from(['compatibilityProperties' => []]),
        CompatibilityData::from(['compatibilityProperties' => []]),
    ];

    $request = CreateOrReplaceProductCompatibilityRequest::make('SKU-123')
        ->compatibility($compatibilities);

    $body = $request->body();

    expect($body['compatibility'])->toHaveCount(2);
});

// DeleteProductCompatibilityRequest Tests
test('DeleteProductCompatibilityRequest builds correct endpoint', function () {
    $request = DeleteProductCompatibilityRequest::make('SKU-123');

    expect($request->endpoint())->toBe('/sell/inventory/v1/inventory_item/SKU-123/product_compatibility');
    expect($request->method())->toBe('DELETE');
});
