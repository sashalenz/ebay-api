<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Tests\Factories;

use Sashalenz\EbayApi\Data\Sell\Inventory\AmountData;
use Sashalenz\EbayApi\Data\Sell\Inventory\ListingPoliciesData;
use Sashalenz\EbayApi\Data\Sell\Inventory\OfferData;
use Sashalenz\EbayApi\Data\Sell\Inventory\PricingSummaryData;
use Sashalenz\EbayApi\Enums\MarketplaceId;

/**
 * Offer Data Factory
 *
 * Factory for creating test OfferData objects.
 */
class OfferDataFactory
{
    /**
     * Create a basic OfferData instance
     */
    public static function make(array $overrides = []): OfferData
    {
        return OfferData::from(array_merge([
            'offerId' => 'test-offer-123',
            'sku' => 'TEST-SKU-001',
            'marketplaceId' => 'EBAY_US',
            'format' => 'FIXED_PRICE',
            'categoryId' => '139971',
            'pricingSummary' => [
                'price' => [
                    'value' => '99.99',
                    'currency' => 'USD',
                ],
            ],
            'listingPolicies' => [
                'fulfillmentPolicyId' => 'policy-123',
                'paymentPolicyId' => 'policy-456',
                'returnPolicyId' => 'policy-789',
            ],
            'status' => 'PUBLISHED',
        ], $overrides));
    }

    /**
     * Create with full nested data
     */
    public static function makeComplete(): OfferData
    {
        return OfferData::from([
            'offerId' => 'complete-offer-456',
            'sku' => 'TEST-SKU-COMPLETE',
            'marketplaceId' => MarketplaceId::EBAY_US->value,
            'format' => 'FIXED_PRICE',
            'availableQuantity' => 50,
            'categoryId' => '139971',
            'pricingSummary' => PricingSummaryData::from([
                'price' => AmountData::from([
                    'value' => '999.99',
                    'currency' => 'USD',
                ]),
                'originalRetailPrice' => AmountData::from([
                    'value' => '1199.99',
                    'currency' => 'USD',
                ]),
            ]),
            'listingPolicies' => ListingPoliciesData::from([
                'fulfillmentPolicyId' => 'fulfillment-123',
                'paymentPolicyId' => 'payment-456',
                'returnPolicyId' => 'return-789',
            ]),
            'quantityLimitPerBuyer' => 5,
            'merchantLocationKey' => 'warehouse-01',
            'status' => 'PUBLISHED',
            'listingId' => 'listing-789',
        ]);
    }
}
