# Builder Pattern - Приклади використання

Всі Request класи тепер використовують Builder Pattern з типізованими Data об'єктами та Enums.

## 📦 Створення Inventory Item

### Старий підхід (array):
```php
$data = [
    'product' => [
        'title' => 'iPhone 15 Pro',
        'description' => 'New iPhone',
        //...
    ],
    'condition' => 'NEW',
    'availability' => [
        'shipToLocationAvailability' => [
            'quantity' => 10,
        ],
    ],
];

$response = CreateOrReplaceInventoryItemRequest::make('SKU-123', $data)->send();
```

### Новий підхід (Builder Pattern):
```php
use Sashalenz\EbayApi\Data\Sell\Inventory\ProductData;
use Sashalenz\EbayApi\Data\Sell\Inventory\AvailabilityData;
use Sashalenz\EbayApi\Data\Sell\Inventory\ShipToLocationAvailabilityData;
use Sashalenz\EbayApi\Enums\Condition;
use Sashalenz\EbayApi\Enums\Locale;

$response = CreateOrReplaceInventoryItemRequest::make('SKU-123')
    ->product(ProductData::from([
        'title' => 'iPhone 15 Pro',
        'description' => 'New iPhone 15 Pro Max',
        'brand' => 'Apple',
        'mpn' => 'MTUW3',
    ]))
    ->condition(Condition::NEW)
    ->locale(Locale::EN_US)
    ->availability(AvailabilityData::from([
        'shipToLocationAvailability' => ShipToLocationAvailabilityData::from([
            'quantity' => 10,
        ]),
    ]))
    ->send();
```

## 🎯 Створення Offer

### Новий підхід з Builder Pattern:
```php
use Sashalenz\EbayApi\Data\Sell\Inventory\PricingSummaryData;
use Sashalenz\EbayApi\Data\Sell\Inventory\AmountData;
use Sashalenz\EbayApi\Data\Sell\Inventory\ListingPoliciesData;
use Sashalenz\EbayApi\Enums\MarketplaceId;

$offer = CreateOfferRequest::make('SKU-123', MarketplaceId::EBAY_US, 'FIXED_PRICE')
    ->categoryId('139971')
    ->pricingSummary(PricingSummaryData::from([
        'price' => AmountData::from([
            'currency' => 'USD',
            'value' => '999.99',
        ]),
    ]))
    ->listingPolicies(ListingPoliciesData::from([
        'fulfillmentPolicyId' => 'policy-123',
        'paymentPolicyId' => 'policy-456',
        'returnPolicyId' => 'policy-789',
    ]))
    ->quantityLimitPerBuyer(5)
    ->merchantLocationKey('warehouse-01')
    ->send();
```

## 📊 Bulk операції

### Bulk Update Price/Quantity:
```php
use Sashalenz\EbayApi\Data\Sell\Inventory\AvailabilityData;
use Sashalenz\EbayApi\Data\Sell\Inventory\PricingSummaryData;

$response = BulkUpdatePriceQuantityRequest::make()
    ->addRequest(
        'SKU-001',
        AvailabilityData::from(['shipToLocationAvailability' => ['quantity' => 50]]),
        PricingSummaryData::from(['price' => ['value' => '29.99', 'currency' => 'USD']])
    )
    ->addRequest(
        'SKU-002',
        AvailabilityData::from(['shipToLocationAvailability' => ['quantity' => 100]]),
        PricingSummaryData::from(['price' => ['value' => '49.99', 'currency' => 'USD']])
    )
    ->send();
```

### Bulk Create Offers:
```php
use Sashalenz\EbayApi\Data\Sell\Inventory\OfferData;

$response = BulkCreateOfferRequest::make()
    ->addOffer(OfferData::from([
        'sku' => 'SKU-001',
        'marketplaceId' => 'EBAY_US',
        'format' => 'FIXED_PRICE',
        'categoryId' => '139971',
        'pricingSummary' => ['price' => ['value' => '99.99', 'currency' => 'USD']],
    ]))
    ->addOffer(OfferData::from([
        'sku' => 'SKU-002',
        'marketplaceId' => 'EBAY_US',
        'format' => 'FIXED_PRICE',
        'categoryId' => '139971',
        'pricingSummary' => ['price' => ['value' => '149.99', 'currency' => 'USD']],
    ]))
    ->send();
```

### Get Listing Fees:
```php
$fees = GetListingFeesRequest::make()
    ->addOfferId('offer-123')
    ->addOfferId('offer-456')
    ->addOfferId('offer-789')
    ->asData();

foreach ($fees->feeSummaries ?? [] as $summary) {
    echo "Marketplace: {$summary->marketplaceId}" . PHP_EOL;
    foreach ($summary->fees ?? [] as $fee) {
        echo "  - {$fee->feeType}: {$fee->amount?->value} {$fee->amount?->currency}" . PHP_EOL;
    }
}
```

## ✨ Переваги Builder Pattern

✅ **Type Safety** - IDE автодоповнення для всіх методів і параметрів  
✅ **Enums** - Використання типізованих Enum замість строк  
✅ **Data Objects** - Повна валідація через Spatie Laravel Data  
✅ **Readable** - Зрозумілий і читабельний код  
✅ **Chainable** - Fluent interface для побудови запитів  
✅ **Discoverable** - Легко знайти доступні опції  

## 📚 Інші приклади

### Update Offer:
```php
UpdateOfferRequest::make('offer-123')
    ->pricingSummary(PricingSummaryData::from([
        'price' => ['value' => '899.99', 'currency' => 'USD'],
    ]))
    ->quantityLimitPerBuyer(3)
    ->send();
```

### Bulk Create Inventory Items:
```php
BulkCreateOrReplaceInventoryItemRequest::make()
    ->addRequest('SKU-001', InventoryItemData::from([
        'product' => ['title' => 'Product 1'],
        'condition' => 'NEW',
    ]))
    ->addRequest('SKU-002', InventoryItemData::from([
        'product' => ['title' => 'Product 2'],
        'condition' => 'NEW',
    ]))
    ->send();
```

## ⚠️ Валідація запитів

Всі Request класи автоматично валідуються перед відправкою:

```php
use Sashalenz\EbayApi\Exceptions\ValidationException;
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem\CreateOrReplaceInventoryItemRequest;

try {
    // Missing required fields
    $response = CreateOrReplaceInventoryItemRequest::make('SKU-123')->send();
} catch (ValidationException $e) {
    // Get validation errors
    $errors = $e->getErrors();
    // ['Product information is required', 'Condition is required', 'Availability information is required']
    
    echo $e->getMessage();
    // Request validation failed: Product information is required, Condition is required, Availability information is required
}
```

### Перевірка максимальних лімітів:

```php
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem\BulkGetInventoryItemRequest;

$request = BulkGetInventoryItemRequest::make();

// Add 26 SKUs (exceeds limit of 25)
for ($i = 1; $i <= 26; $i++) {
    $request->addSku("SKU-{$i}");
}

try {
    $request->send();
} catch (ValidationException $e) {
    echo $e->getMessage();
    // Request validation failed: Maximum 25 SKUs allowed per request
}
```

### Валідація обов'язкових полів:

```php
// CreateOfferRequest валідує:
// - pricingSummary (required)
// - listingPolicies (required)
// - categoryId (required)

// CreateInventoryLocationRequest валідує:
// - name (required)
// - location (required)
// - locationTypes (at least one)

// UpdateOfferRequest валідує:
// - At least one field must be provided for update
```

## 🎯 Підсумок

Усі Request класи, які раніше приймали `array $data`, тепер використовують:
- Типізовані властивості
- Builder методи для кожної властивості
- Data об'єкти замість масивів
- Enums для фіксованих значень
- Fluent interface для зручності
- **Автоматична валідація перед відправкою**

Це забезпечує повну type-safety та чудовий developer experience!

