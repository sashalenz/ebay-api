<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Tests\Factories;

use Sashalenz\EbayApi\Data\Sell\Inventory\AvailabilityData;
use Sashalenz\EbayApi\Data\Sell\Inventory\InventoryItemData;
use Sashalenz\EbayApi\Data\Sell\Inventory\PackageWeightAndSizeData;
use Sashalenz\EbayApi\Data\Sell\Inventory\ProductData;
use Sashalenz\EbayApi\Data\Sell\Inventory\ShipToLocationAvailabilityData;
use Sashalenz\EbayApi\Enums\Condition;
use Sashalenz\EbayApi\Enums\Locale;

/**
 * Inventory Item Data Factory
 *
 * Factory for creating test InventoryItemData objects.
 */
class InventoryItemDataFactory
{
    /**
     * Create a basic InventoryItemData instance
     */
    public static function make(array $overrides = []): InventoryItemData
    {
        return InventoryItemData::from(array_merge([
            'sku' => 'TEST-SKU-001',
            'product' => [
                'title' => 'Test Product',
                'description' => 'Test Description',
                'brand' => 'Test Brand',
                'mpn' => 'TEST-MPN-001',
                'aspects' => [
                    'Brand' => ['Test Brand'],
                    'Model' => ['Test Model'],
                ],
                'imageUrls' => ['https://example.com/image1.jpg'],
            ],
            'condition' => 'NEW',
            'availability' => [
                'shipToLocationAvailability' => [
                    'quantity' => 10,
                ],
            ],
            'locale' => 'en_US',
        ], $overrides));
    }

    /**
     * Create with full nested data
     */
    public static function makeComplete(): InventoryItemData
    {
        return InventoryItemData::from([
            'sku' => 'TEST-SKU-COMPLETE',
            'product' => ProductData::from([
                'title' => 'Complete Test Product',
                'description' => 'Complete test description with all fields',
                'brand' => 'Apple',
                'mpn' => 'MTUW3',
                'aspects' => [
                    'Brand' => ['Apple'],
                    'Model' => ['iPhone 15 Pro'],
                    'Storage Capacity' => ['256 GB'],
                ],
                'imageUrls' => [
                    'https://example.com/image1.jpg',
                    'https://example.com/image2.jpg',
                ],
            ]),
            'condition' => Condition::NEW,
            'availability' => AvailabilityData::from([
                'shipToLocationAvailability' => ShipToLocationAvailabilityData::from([
                    'quantity' => 100,
                ]),
            ]),
            'locale' => Locale::EN_US,
            'packageWeightAndSize' => PackageWeightAndSizeData::from([
                'dimensions' => [
                    'length' => '10',
                    'width' => '5',
                    'height' => '3',
                    'unit' => 'INCH',
                ],
                'weight' => [
                    'value' => '1.5',
                    'unit' => 'POUND',
                ],
            ]),
        ]);
    }
}
