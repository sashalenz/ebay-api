<?php

declare(strict_types=1);

use Sashalenz\EbayApi\Data\Sell\Inventory\ListingFeesData;
use Sashalenz\EbayApi\Data\Sell\Inventory\ListingPoliciesData;
use Sashalenz\EbayApi\Data\Sell\Inventory\OfferData;
use Sashalenz\EbayApi\Data\Sell\Inventory\OffersData;
use Sashalenz\EbayApi\Data\Sell\Inventory\PricingSummaryData;
use Sashalenz\EbayApi\Data\Sell\Inventory\PublishResponseData;
use Sashalenz\EbayApi\Data\Sell\Inventory\WithdrawResponseData;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Exceptions\ValidationException;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\BulkCreateOfferRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\BulkPublishOfferRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\CreateOfferRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\DeleteOfferRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\GetListingFeesRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\GetOfferRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\GetOffersRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\PublishOfferByInventoryItemGroupRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\PublishOfferRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\UpdateOfferRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\WithdrawOfferByInventoryItemGroupRequest;
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\WithdrawOfferRequest;
use Sashalenz\EbayApi\Tests\Factories\OfferDataFactory;

// GetOfferRequest Tests
test('GetOfferRequest builds correct endpoint', function () {
    $request = GetOfferRequest::make('offer-123');

    expect($request->endpoint())->toBe('/sell/inventory/v1/offer/offer-123');
    expect($request->method())->toBe('GET');
    expect($request->dto())->toBe(OfferData::class);
});

test('GetOfferRequest maps response to OfferData', function () {
    $mockResponse = test()->successResponse(test()->loadFixture('OfferResponse.json'));
    $client = test()->createMockClient([$mockResponse]);

    $request = new GetOfferRequest($client, 'test-offer-123');
    $data = $request->asData();

    expect($data)->toBeInstanceOf(OfferData::class);
    expect($data->offerId)->toBe('test-offer-123');
    expect($data->sku)->toBe('TEST-SKU-001');
});

// GetOffersRequest Tests
test('GetOffersRequest supports pagination and filtering', function () {
    $request = GetOffersRequest::make()
        ->sku('TEST-SKU')
        ->limit(50)
        ->offset(10);

    $query = $request->query();

    expect($query)->toBe(['sku' => 'TEST-SKU', 'limit' => 50, 'offset' => 10]);
    expect($request->dto())->toBe(OffersData::class);
});

test('GetOffersRequest maps response to OffersData', function () {
    $mockResponse = test()->successResponse(test()->loadFixture('OffersResponse.json'));
    $client = test()->createMockClient([$mockResponse]);

    $request = new GetOffersRequest($client);
    $data = $request->asData();

    expect($data)->toBeInstanceOf(OffersData::class);
    expect($data->total)->toBe(2);
    expect($data->offers)->toHaveCount(2);
});

// CreateOfferRequest Tests
test('CreateOfferRequest validates required fields', function () {
    $request = CreateOfferRequest::make('SKU-123', MarketplaceId::EBAY_US, 'FIXED_PRICE');

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class);
});

test('CreateOfferRequest validates pricingSummary is required', function () {
    $request = CreateOfferRequest::make('SKU-123', MarketplaceId::EBAY_US, 'FIXED_PRICE')
        ->categoryId('139971')
        ->listingPolicies(ListingPoliciesData::from([
            'fulfillmentPolicyId' => 'policy-123',
        ]));

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'Pricing summary is required');
});

test('CreateOfferRequest Builder Pattern builds correct body', function () {
    $request = CreateOfferRequest::make('SKU-123', MarketplaceId::EBAY_US, 'FIXED_PRICE')
        ->categoryId('139971')
        ->pricingSummary(PricingSummaryData::from(['price' => ['value' => '99.99', 'currency' => 'USD']]))
        ->listingPolicies(ListingPoliciesData::from(['fulfillmentPolicyId' => 'policy-123']))
        ->quantityLimitPerBuyer(5)
        ->merchantLocationKey('warehouse-01');

    $body = $request->body();

    expect($body['sku'])->toBe('SKU-123');
    expect($body['marketplaceId'])->toBe('EBAY_US');
    expect($body['format'])->toBe('FIXED_PRICE');
    expect($body['categoryId'])->toBe('139971');
    expect($body['quantityLimitPerBuyer'])->toBe(5);
    expect($body['merchantLocationKey'])->toBe('warehouse-01');
});

test('CreateOfferRequest supports adding secondary category IDs', function () {
    $request = CreateOfferRequest::make('SKU-123', MarketplaceId::EBAY_US, 'FIXED_PRICE')
        ->addSecondaryCategoryId('cat-1')
        ->addSecondaryCategoryId('cat-2');

    $body = $request->body();

    expect($body['secondaryCategoryId'])->toHaveCount(2);
});

// UpdateOfferRequest Tests
test('UpdateOfferRequest validates at least one field', function () {
    $request = UpdateOfferRequest::make('offer-123');

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'At least one field must be provided');
});

test('UpdateOfferRequest Builder Pattern works', function () {
    $request = UpdateOfferRequest::make('offer-123')
        ->pricingSummary(PricingSummaryData::from(['price' => ['value' => '149.99', 'currency' => 'USD']]))
        ->quantityLimitPerBuyer(3);

    $body = $request->body();

    expect($body)->toHaveKey('pricingSummary');
    expect($body)->toHaveKey('quantityLimitPerBuyer');
    expect($body['quantityLimitPerBuyer'])->toBe(3);
});

// DeleteOfferRequest Tests
test('DeleteOfferRequest builds correct endpoint', function () {
    $request = DeleteOfferRequest::make('offer-123');

    expect($request->endpoint())->toBe('/sell/inventory/v1/offer/offer-123');
    expect($request->method())->toBe('DELETE');
});

// PublishOfferRequest Tests
test('PublishOfferRequest builds correct endpoint and dto', function () {
    $request = PublishOfferRequest::make('offer-123');

    expect($request->endpoint())->toBe('/sell/inventory/v1/offer/offer-123/publish');
    expect($request->method())->toBe('POST');
    expect($request->dto())->toBe(PublishResponseData::class);
});

// WithdrawOfferRequest Tests
test('WithdrawOfferRequest returns correct dto', function () {
    $request = WithdrawOfferRequest::make('offer-123');

    expect($request->endpoint())->toBe('/sell/inventory/v1/offer/offer-123/withdraw');
    expect($request->dto())->toBe(WithdrawResponseData::class);
});

// BulkCreateOfferRequest Tests
test('BulkCreateOfferRequest validates minimum offers', function () {
    $request = BulkCreateOfferRequest::make();

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'At least one offer is required');
});

test('BulkCreateOfferRequest validates maximum offers', function () {
    $request = BulkCreateOfferRequest::make();

    for ($i = 1; $i <= 26; $i++) {
        $request->addOffer(OfferDataFactory::make(['offerId' => "offer-{$i}"]));
    }

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'Maximum 25 offers allowed');
});

test('BulkCreateOfferRequest builds correct body', function () {
    $offer1 = OfferDataFactory::make(['offerId' => 'offer-1']);
    $offer2 = OfferDataFactory::make(['offerId' => 'offer-2']);

    $request = BulkCreateOfferRequest::make()
        ->addOffer($offer1)
        ->addOffer($offer2);

    $body = $request->body();

    expect($body['requests'])->toHaveCount(2);
});

// BulkPublishOfferRequest Tests
test('BulkPublishOfferRequest validates minimum offers', function () {
    $request = BulkPublishOfferRequest::make();

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'At least one offer ID is required');
});

test('BulkPublishOfferRequest supports fluent interface', function () {
    $request = BulkPublishOfferRequest::make()
        ->addOfferId('offer-1')
        ->addOfferId('offer-2')
        ->offerIds(['offer-3', 'offer-4']);

    $body = $request->body();

    expect($body['requests'])->toHaveCount(4);
});

// GetListingFeesRequest Tests
test('GetListingFeesRequest validates at least one offer ID', function () {
    $request = GetListingFeesRequest::make();

    expect(fn () => $request->send())
        ->toThrow(ValidationException::class, 'At least one offer ID is required');
});

test('GetListingFeesRequest builds correct body', function () {
    $request = GetListingFeesRequest::make()
        ->addOfferId('offer-1')
        ->addOfferId('offer-2');

    $body = $request->body();

    expect($body['offers'])->toHaveCount(2);
    expect($body['offers'][0]['offerId'])->toBe('offer-1');
    expect($request->dto())->toBe(ListingFeesData::class);
});

// PublishOfferByInventoryItemGroupRequest Tests
test('PublishOfferByInventoryItemGroupRequest uses MarketplaceId Enum', function () {
    $request = PublishOfferByInventoryItemGroupRequest::make('group-key-123', MarketplaceId::EBAY_GB);

    $body = $request->body();

    expect($body['inventoryItemGroupKey'])->toBe('group-key-123');
    expect($body['marketplaceId'])->toBe('EBAY_GB');
});

// WithdrawOfferByInventoryItemGroupRequest Tests
test('WithdrawOfferByInventoryItemGroupRequest builds correct body', function () {
    $request = WithdrawOfferByInventoryItemGroupRequest::make('group-key-456', MarketplaceId::EBAY_DE);

    $body = $request->body();

    expect($body['inventoryItemGroupKey'])->toBe('group-key-456');
    expect($body['marketplaceId'])->toBe('EBAY_DE');
});
