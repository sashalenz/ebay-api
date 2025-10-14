<?php

declare(strict_types=1);

use Sashalenz\EbayApi\Data\Sell\Inventory\InventoryItemGroupData;
use Sashalenz\EbayApi\Data\Sell\Inventory\VariesByData;
use Sashalenz\EbayApi\Exceptions\ValidationException;
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItemGroup\CreateOrReplaceInventoryItemGroupRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItemGroup\DeleteInventoryItemGroupRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItemGroup\GetInventoryItemGroupRequest;

// GetInventoryItemGroupRequest Tests
test('GetInventoryItemGroupRequest builds correct endpoint', function () {
    $request = GetInventoryItemGroupRequest::make('group-key-123');

    expect($request->endpoint())->toBe('/sell/inventory/v1/inventory_item_group/group-key-123');
    expect($request->method())->toBe('GET');
    expect($request->dto())->toBe(InventoryItemGroupData::class);
});

// CreateOrReplaceInventoryItemGroupRequest Tests
test('CreateOrReplaceInventoryItemGroupRequest validates required fields', function () {
    $request = CreateOrReplaceInventoryItemGroupRequest::make('group-key-123');

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class);
});

test('CreateOrReplaceInventoryItemGroupRequest validates title is required', function () {
    $request = CreateOrReplaceInventoryItemGroupRequest::make('group-key-123')
        ->addVariantSKU('SKU-1')
        ->variesBy(VariesByData::from(['specifications' => ['Color']]));

    $errors = [];
    try {
        $request->send();
    } catch (ValidationException $e) {
        $errors = $e->getErrors();
    }

    expect($errors)->toContain('Title is required');
});

test('CreateOrReplaceInventoryItemGroupRequest Builder Pattern builds correct body', function () {
    $request = CreateOrReplaceInventoryItemGroupRequest::make('group-key-123')
        ->title('Test Product Group')
        ->description('Test description')
        ->addAspect('Brand', ['Apple'])
        ->addAspect('Model', ['iPhone 15 Pro', 'iPhone 15'])
        ->addImageUrl('https://example.com/img1.jpg')
        ->addImageUrl('https://example.com/img2.jpg')
        ->variesBy(VariesByData::from(['specifications' => ['Color', 'Storage']]))
        ->addVariantSKU('SKU-BLACK-128GB')
        ->addVariantSKU('SKU-WHITE-256GB')
        ->addVideoId('video-123');

    $body = $request->body();

    expect($body['title'])->toBe('Test Product Group');
    expect($body['description'])->toBe('Test description');
    expect($body['aspects']['Brand'])->toContain('Apple');
    expect($body['imageUrls'])->toHaveCount(2);
    expect($body['variantSKUs'])->toHaveCount(2);
    expect($body['videoIds'])->toHaveCount(1);
});

test('CreateOrReplaceInventoryItemGroupRequest supports aspects() method', function () {
    $request = CreateOrReplaceInventoryItemGroupRequest::make('group-key-123')
        ->aspects(['Brand' => ['Apple'], 'Model' => ['iPhone']]);

    $body = $request->body();

    expect($body['aspects'])->toHaveKey('Brand');
    expect($body['aspects'])->toHaveKey('Model');
});

// DeleteInventoryItemGroupRequest Tests
test('DeleteInventoryItemGroupRequest builds correct endpoint', function () {
    $request = DeleteInventoryItemGroupRequest::make('group-key-123');

    expect($request->endpoint())->toBe('/sell/inventory/v1/inventory_item_group/group-key-123');
    expect($request->method())->toBe('DELETE');
});
