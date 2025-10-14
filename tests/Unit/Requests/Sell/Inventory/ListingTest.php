<?php

declare(strict_types=1);

use Sashalenz\EbayApi\Data\Sell\Inventory\BulkMigrateListingResponseData;
use Sashalenz\EbayApi\Exceptions\ValidationException;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Listing\BulkMigrateListingRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Listing\CreateOrReplaceSkuLocationMappingRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Listing\DeleteSkuLocationMappingRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Listing\GetSkuLocationMappingRequest;

// BulkMigrateListingRequest Tests
test('BulkMigrateListingRequest validates at least one listing ID', function () {
    $request = BulkMigrateListingRequest::make();

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'At least one listing ID is required');
});

test('BulkMigrateListingRequest supports fluent interface', function () {
    $request = BulkMigrateListingRequest::make()
        ->addListingId('listing-123')
        ->addListingId('listing-456')
        ->listingIds(['listing-789']);

    $body = $request->body();

    expect($body['requests'])->toHaveCount(3);
    expect($body['requests'][0]['listingId'])->toBe('listing-123');
    expect($request->dto())->toBe(BulkMigrateListingResponseData::class);
});

// GetSkuLocationMappingRequest Tests
test('GetSkuLocationMappingRequest builds correct endpoint', function () {
    $request = GetSkuLocationMappingRequest::make('listing-123');

    expect($request->endpoint())->toBe('/sell/inventory/v1/listing/listing-123/sku_location_mapping');
    expect($request->method())->toBe('GET');
});

// CreateOrReplaceSkuLocationMappingRequest Tests
test('CreateOrReplaceSkuLocationMappingRequest uses typed constructor', function () {
    $request = CreateOrReplaceSkuLocationMappingRequest::make('listing-123', 'SKU-456', 'warehouse-01');

    $body = $request->body();

    expect($body['sku'])->toBe('SKU-456');
    expect($body['merchantLocationKey'])->toBe('warehouse-01');
    expect($request->endpoint())->toBe('/sell/inventory/v1/listing/listing-123/sku_location_mapping');
    expect($request->method())->toBe('PUT');
});

// DeleteSkuLocationMappingRequest Tests
test('DeleteSkuLocationMappingRequest builds correct endpoint', function () {
    $request = DeleteSkuLocationMappingRequest::make('listing-123');

    expect($request->endpoint())->toBe('/sell/inventory/v1/listing/listing-123/sku_location_mapping');
    expect($request->method())->toBe('DELETE');
});
