<?php

declare(strict_types=1);

use Sashalenz\EbayApi\Data\Sell\Inventory\AvailabilityData;
use Sashalenz\EbayApi\Data\Sell\Inventory\ListingPoliciesData;
use Sashalenz\EbayApi\Data\Sell\Inventory\LocationData;
use Sashalenz\EbayApi\Data\Sell\Inventory\PricingSummaryData;
use Sashalenz\EbayApi\Data\Sell\Inventory\ProductData;
use Sashalenz\EbayApi\Data\Sell\Inventory\VariesByData;
use Sashalenz\EbayApi\Enums\Condition;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Exceptions\ValidationException;
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem\BulkCreateOrReplaceInventoryItemRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem\BulkGetInventoryItemRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem\BulkUpdatePriceQuantityRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem\CreateOrReplaceInventoryItemRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItemGroup\CreateOrReplaceInventoryItemGroupRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Listing\BulkMigrateListingRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Location\CreateInventoryLocationRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\BulkCreateOfferRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\BulkPublishOfferRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\CreateOfferRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\GetListingFeesRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\UpdateOfferRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\ProductCompatibility\CreateOrReplaceProductCompatibilityRequest;

// Basic ValidationException Tests
it('ValidationException can be created with errors', function () {
    $errors = ['Error 1', 'Error 2', 'Error 3'];
    $exception = ValidationException::withErrors($errors);

    expect($exception)->toBeInstanceOf(ValidationException::class);
    expect($exception->getErrors())->toBe($errors);
    expect($exception->getMessage())->toContain('Error 1');
    expect($exception->getMessage())->toContain('Error 2');
    expect($exception->getMessage())->toContain('Error 3');
});

it('ValidationException getErrors returns array', function () {
    $exception = ValidationException::withErrors(['Test error']);

    expect($exception->getErrors())->toBeArray();
    expect($exception->getErrors())->toHaveCount(1);
});

// CreateOrReplaceInventoryItemRequest Validation
it('CreateOrReplaceInventoryItemRequest requires product', function () {
    $request = CreateOrReplaceInventoryItemRequest::make('TEST-SKU')
        ->condition(Condition::NEW)
        ->availability(AvailabilityData::from(['shipToLocationAvailability' => ['quantity' => 1]]));

    try {
        $request->send();
        expect(false)->toBeTrue('Should have thrown ValidationException');
    } catch (ValidationException $e) {
        expect($e->getErrors())->toContain('Product information is required');
    }
});

it('CreateOrReplaceInventoryItemRequest requires condition', function () {
    $request = CreateOrReplaceInventoryItemRequest::make('TEST-SKU')
        ->product(ProductData::from(['title' => 'Test']))
        ->availability(AvailabilityData::from(['shipToLocationAvailability' => ['quantity' => 1]]));

    try {
        $request->send();
        expect(false)->toBeTrue('Should have thrown ValidationException');
    } catch (ValidationException $e) {
        expect($e->getErrors())->toContain('Condition is required');
    }
});

it('CreateOrReplaceInventoryItemRequest requires availability', function () {
    $request = CreateOrReplaceInventoryItemRequest::make('TEST-SKU')
        ->product(ProductData::from(['title' => 'Test']))
        ->condition(Condition::NEW);

    try {
        $request->send();
        expect(false)->toBeTrue('Should have thrown ValidationException');
    } catch (ValidationException $e) {
        expect($e->getErrors())->toContain('Availability information is required');
    }
});

// CreateOfferRequest Validation
it('CreateOfferRequest requires pricingSummary', function () {
    $request = CreateOfferRequest::make('SKU-123', MarketplaceId::EBAY_US, 'FIXED_PRICE')
        ->categoryId('139971')
        ->listingPolicies(ListingPoliciesData::from(['fulfillmentPolicyId' => 'policy-123']));

    try {
        $request->send();
        expect(false)->toBeTrue('Should have thrown ValidationException');
    } catch (ValidationException $e) {
        expect($e->getErrors())->toContain('Pricing summary is required');
    }
});

it('CreateOfferRequest requires listingPolicies', function () {
    $request = CreateOfferRequest::make('SKU-123', MarketplaceId::EBAY_US, 'FIXED_PRICE')
        ->categoryId('139971')
        ->pricingSummary(PricingSummaryData::from(['price' => ['value' => '99', 'currency' => 'USD']]));

    try {
        $request->send();
        expect(false)->toBeTrue('Should have thrown ValidationException');
    } catch (ValidationException $e) {
        expect($e->getErrors())->toContain('Listing policies are required');
    }
});

it('CreateOfferRequest requires categoryId', function () {
    $request = CreateOfferRequest::make('SKU-123', MarketplaceId::EBAY_US, 'FIXED_PRICE')
        ->pricingSummary(PricingSummaryData::from(['price' => ['value' => '99', 'currency' => 'USD']]))
        ->listingPolicies(ListingPoliciesData::from(['fulfillmentPolicyId' => 'policy-123']));

    try {
        $request->send();
        expect(false)->toBeTrue('Should have thrown ValidationException');
    } catch (ValidationException $e) {
        expect($e->getErrors())->toContain('Category ID is required');
    }
});

// UpdateOfferRequest Validation
it('UpdateOfferRequest requires at least one field', function () {
    $request = UpdateOfferRequest::make('offer-123');

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'At least one field must be provided');
});

// CreateInventoryLocationRequest Validation
it('CreateInventoryLocationRequest requires name', function () {
    $request = CreateInventoryLocationRequest::make('warehouse-01')
        ->location(LocationData::from(['address' => ['city' => 'Test']]))
        ->addLocationType('WAREHOUSE');

    try {
        $request->send();
        expect(false)->toBeTrue('Should have thrown ValidationException');
    } catch (ValidationException $e) {
        expect($e->getErrors())->toContain('Location name is required');
    }
});

it('CreateInventoryLocationRequest requires location data', function () {
    $request = CreateInventoryLocationRequest::make('warehouse-01')
        ->name('Test Warehouse')
        ->addLocationType('WAREHOUSE');

    try {
        $request->send();
        expect(false)->toBeTrue('Should have thrown ValidationException');
    } catch (ValidationException $e) {
        expect($e->getErrors())->toContain('Location data (address) is required');
    }
});

it('CreateInventoryLocationRequest requires at least one location type', function () {
    $request = CreateInventoryLocationRequest::make('warehouse-01')
        ->name('Test Warehouse')
        ->location(LocationData::from(['address' => ['city' => 'Test']]));

    try {
        $request->send();
        expect(false)->toBeTrue('Should have thrown ValidationException');
    } catch (ValidationException $e) {
        expect($e->getErrors())->toContain('At least one location type is required');
    }
});

// CreateOrReplaceInventoryItemGroupRequest Validation
it('CreateOrReplaceInventoryItemGroupRequest requires title', function () {
    $request = CreateOrReplaceInventoryItemGroupRequest::make('group-key-123')
        ->addVariantSKU('SKU-1')
        ->variesBy(VariesByData::from(['specifications' => ['Color']]));

    try {
        $request->send();
        expect(false)->toBeTrue('Should have thrown ValidationException');
    } catch (ValidationException $e) {
        expect($e->getErrors())->toContain('Title is required');
    }
});

it('CreateOrReplaceInventoryItemGroupRequest requires variantSKUs', function () {
    $request = CreateOrReplaceInventoryItemGroupRequest::make('group-key-123')
        ->title('Test Group')
        ->variesBy(VariesByData::from(['specifications' => ['Color']]));

    try {
        $request->send();
        expect(false)->toBeTrue('Should have thrown ValidationException');
    } catch (ValidationException $e) {
        expect($e->getErrors())->toContain('At least one variant SKU is required');
    }
});

it('CreateOrReplaceInventoryItemGroupRequest requires variesBy', function () {
    $request = CreateOrReplaceInventoryItemGroupRequest::make('group-key-123')
        ->title('Test Group')
        ->addVariantSKU('SKU-1');

    try {
        $request->send();
        expect(false)->toBeTrue('Should have thrown ValidationException');
    } catch (ValidationException $e) {
        expect($e->getErrors())->toContain('VariesBy data is required');
    }
});

// CreateOrReplaceProductCompatibilityRequest Validation
it('CreateOrReplaceProductCompatibilityRequest requires compatibility entries', function () {
    $request = CreateOrReplaceProductCompatibilityRequest::make('SKU-123');

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'At least one compatibility entry is required');
});

// Bulk Operations Validation - Edge Cases
it('BulkGetInventoryItemRequest accepts exactly 25 items', function () {
    $request = BulkGetInventoryItemRequest::make();

    for ($i = 1; $i <= 25; $i++) {
        $request->addSku("SKU-{$i}");
    }

    $body = $request->body();

    expect($body['requests'])->toHaveCount(25);
});

it('BulkCreateOrReplaceInventoryItemRequest accepts exactly 25 items', function () {
    $request = BulkCreateOrReplaceInventoryItemRequest::make();

    for ($i = 1; $i <= 25; $i++) {
        $item = \Sashalenz\EbayApi\Tests\Factories\InventoryItemDataFactory::make(['sku' => "SKU-{$i}"]);
        $request->addRequest("SKU-{$i}", $item);
    }

    $body = $request->body();

    expect($body['requests'])->toHaveCount(25);
});

it('BulkUpdatePriceQuantityRequest rejects 26 items', function () {
    $request = BulkUpdatePriceQuantityRequest::make();

    $availability = AvailabilityData::from(['shipToLocationAvailability' => ['quantity' => 1]]);

    for ($i = 1; $i <= 26; $i++) {
        $request->addRequest("SKU-{$i}", $availability);
    }

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'Maximum 25 items allowed');
});

it('BulkCreateOfferRequest validates max 25 offers', function () {
    $request = BulkCreateOfferRequest::make();

    for ($i = 1; $i <= 26; $i++) {
        $offer = \Sashalenz\EbayApi\Tests\Factories\OfferDataFactory::make(['offerId' => "offer-{$i}"]);
        $request->addOffer($offer);
    }

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class);
});

it('BulkPublishOfferRequest validates max 25 offers', function () {
    $request = BulkPublishOfferRequest::make();

    for ($i = 1; $i <= 26; $i++) {
        $request->addOfferId("offer-{$i}");
    }

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class);
});

it('BulkMigrateListingRequest validates at least one listing ID', function () {
    $request = BulkMigrateListingRequest::make();

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'At least one listing ID is required');
});

it('GetListingFeesRequest validates at least one offer ID', function () {
    $request = GetListingFeesRequest::make();

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'At least one offer ID is required');
});

// ValidationException Methods Tests
it('ValidationException withErrors creates exception with message', function () {
    $errors = ['Error 1', 'Error 2'];
    $exception = ValidationException::withErrors($errors);

    expect($exception->getMessage())->toContain('Error 1');
    expect($exception->getMessage())->toContain('Error 2');
    expect($exception->getMessage())->toContain('Request validation failed');
});

it('ValidationException getErrors returns all errors', function () {
    $errors = ['Field A required', 'Field B invalid', 'Field C too long'];
    $exception = ValidationException::withErrors($errors);

    $result = $exception->getErrors();

    expect($result)->toBeArray();
    expect($result)->toHaveCount(3);
    expect($result)->toBe($errors);
});

// Multiple Validation Errors
it('CreateOrReplaceInventoryItemRequest collects all validation errors', function () {
    $request = CreateOrReplaceInventoryItemRequest::make('TEST-SKU');

    try {
        $request->send();
        expect(false)->toBeTrue('Should have thrown ValidationException');
    } catch (ValidationException $e) {
        $errors = $e->getErrors();

        expect($errors)->toHaveCount(3);
        expect($errors)->toContain('Product information is required');
        expect($errors)->toContain('Condition is required');
        expect($errors)->toContain('Availability information is required');
    }
});

it('CreateOfferRequest collects all validation errors', function () {
    $request = CreateOfferRequest::make('SKU-123', MarketplaceId::EBAY_US, 'FIXED_PRICE');

    try {
        $request->send();
        expect(false)->toBeTrue('Should have thrown ValidationException');
    } catch (ValidationException $e) {
        $errors = $e->getErrors();

        expect($errors)->toHaveCount(3);
        expect($errors)->toContain('Pricing summary is required');
        expect($errors)->toContain('Listing policies are required');
        expect($errors)->toContain('Category ID is required');
    }
});

it('CreateInventoryLocationRequest collects all validation errors', function () {
    $request = CreateInventoryLocationRequest::make('warehouse-01');

    try {
        $request->send();
        expect(false)->toBeTrue('Should have thrown ValidationException');
    } catch (ValidationException $e) {
        $errors = $e->getErrors();

        expect($errors)->toHaveCount(3);
        expect($errors)->toContain('Location name is required');
        expect($errors)->toContain('Location data (address) is required');
        expect($errors)->toContain('At least one location type is required');
    }
});
