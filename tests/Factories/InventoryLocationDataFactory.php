<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Tests\Factories;

use Sashalenz\EbayApi\Data\Sell\Inventory\AddressData;
use Sashalenz\EbayApi\Data\Sell\Inventory\GeoCoordinatesData;
use Sashalenz\EbayApi\Data\Sell\Inventory\IntervalData;
use Sashalenz\EbayApi\Data\Sell\Inventory\InventoryLocationData;
use Sashalenz\EbayApi\Data\Sell\Inventory\LocationData;
use Sashalenz\EbayApi\Data\Sell\Inventory\OperatingHoursData;

/**
 * Inventory Location Data Factory
 *
 * Factory for creating test InventoryLocationData objects.
 */
class InventoryLocationDataFactory
{
    /**
     * Create a basic InventoryLocationData instance
     */
    public static function make(array $overrides = []): InventoryLocationData
    {
        return InventoryLocationData::from(array_merge([
            'merchantLocationKey' => 'warehouse-01',
            'name' => 'Test Warehouse',
            'phone' => '+1234567890',
            'location' => [
                'address' => [
                    'addressLine1' => '123 Test Street',
                    'city' => 'San Jose',
                    'stateOrProvince' => 'CA',
                    'postalCode' => '95125',
                    'country' => 'US',
                ],
            ],
            'locationTypes' => ['WAREHOUSE'],
            'merchantLocationStatus' => 'ENABLED',
        ], $overrides));
    }

    /**
     * Create with full nested data including operating hours
     */
    public static function makeComplete(): InventoryLocationData
    {
        return InventoryLocationData::from([
            'merchantLocationKey' => 'warehouse-complete',
            'name' => 'Complete Test Warehouse',
            'phone' => '+1234567890',
            'location' => LocationData::from([
                'address' => AddressData::from([
                    'addressLine1' => '456 Complete Ave',
                    'addressLine2' => 'Suite 100',
                    'city' => 'San Jose',
                    'stateOrProvince' => 'CA',
                    'postalCode' => '95125',
                    'country' => 'US',
                ]),
                'geoCoordinates' => GeoCoordinatesData::from([
                    'latitude' => 37.3382,
                    'longitude' => -121.8863,
                ]),
            ]),
            'locationTypes' => ['WAREHOUSE', 'STORE'],
            'locationWebUrl' => 'https://example.com',
            'operatingHours' => [
                OperatingHoursData::from([
                    'dayOfWeekEnum' => 'MONDAY',
                    'intervals' => [
                        IntervalData::from(['open' => '09:00', 'close' => '17:00']),
                    ],
                ]),
            ],
            'merchantLocationStatus' => 'ENABLED',
        ]);
    }
}
