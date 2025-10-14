# Data Objects Reference

This document provides a quick reference for all Data objects available in the package.

## Sell Inventory API Data Objects

### InventoryItem Data (13 objects)

- **`InventoryItemData`** - Main inventory item with product, availability, condition
- **`InventoryItemsData`** - Collection of inventory items with pagination
- **`ProductData`** - Product details (title, description, brand, MPN, etc.)
- **`AvailabilityData`** - Complete availability information
- **`ShipToLocationAvailabilityData`** - Ship-to-location availability details
- **`PickupAtLocationAvailabilityData`** - In-store pickup availability
- **`FormatAllocationData`** - Format-specific quantity allocation
- **`AvailabilityDistributionData`** - Availability distribution details
- **`ConditionDescriptorData`** - Detailed condition descriptors
- **`PackageWeightAndSizeData`** - Package dimensions and weight
- **`DimensionData`** - Dimension values (length/width/height)
- **`WeightData`** - Weight values
- **`TimeDurationData`** - Time duration with unit

### Offer Data (14 objects)

- **`OfferData`** - Complete offer information
- **`OffersData`** - Collection of offers with pagination
- **`PricingSummaryData`** - Pricing information (price, MAP, etc.)
- **`AmountData`** - Monetary amount with currency
- **`ListingPoliciesData`** - Business policy IDs (fulfillment, payment, return)
- **`TaxData`** - Tax configuration
- **`CharityData`** - Charity donation information
- **`ExtendedProducerResponsibilityData`** - EPR compliance data
- **`ListingDescriptionData`** - Listing description text
- **`PublishResponseData`** - Response from publishing offer
- **`WithdrawResponseData`** - Response from withdrawing offer
- **`FeeData`** - Individual fee information
- **`FeeSummaryData`** - Summary of all fees for an offer
- **`ListingFeesData`** - Complete listing fees response

### Location Data (8 objects)

- **`InventoryLocationData`** - Complete location information
- **`InventoryLocationsData`** - Collection of locations with pagination
- **`LocationData`** - Physical location details
- **`AddressData`** - Physical address
- **`GeoCoordinatesData`** - GPS coordinates (latitude/longitude)
- **`OperatingHoursData`** - Operating hours for specific day
- **`IntervalData`** - Time interval (open/close)
- **`SpecialHoursData`** - Special hours for specific dates

### InventoryItemGroup Data (2 objects)

- **`InventoryItemGroupData`** - Item group (variations) information
- **`VariesByData`** - Variation aspects configuration

### ProductCompatibility Data (3 objects)

- **`ProductCompatibilityData`** - Complete compatibility information
- **`CompatibilityData`** - Single compatibility entry
- **`NameValueData`** - Name-value pair for compatibility properties

### Listing Data (3 objects)

- **`BulkMigrateListingResponseData`** - Response from bulk migration
- **`MigrationData`** - Single migration result
- **`BulkResponseData`** - Generic bulk operation response

## Commerce Taxonomy API Data Objects (21 objects)

### Category Tree Data

- **`BaseCategoryTreeData`** - Basic category tree info (ID + version)
- **`CategoryTreeData`** - Complete category tree with root node
- **`CategoryTreeNodeData`** - Recursive category tree node
- **`CategoryData`** - Basic category info (ID + name)
- **`CategorySubtreeData`** - Category subtree response

### Category Suggestions Data

- **`CategorySuggestionData`** - Category suggestion with relevancy
- **`AncestorReferenceData`** - Category ancestor information

### Aspects Data

- **`GetCategoriesAspectData`** - Main aspects response
- **`CategoryAspectData`** - Category-specific aspects
- **`AspectData`** - Individual aspect details
- **`AspectConstraintData`** - Aspect constraints
- **`AspectValueData`** - Aspect value details
- **`ValueConstraintData`** - Value constraints
- **`RelevanceIndicatorData`** - Aspect relevance indicator

### Compatibility Data

- **`GetCompatibilityMetadataData`** - Compatibility metadata response
- **`CompatibilityPropertyData`** - Compatibility property details
- **`GetCompatibilityPropertyValuesData`** - Property values response
- **`CompatibilityPropertyValueData`** - Single property value

### Expired Categories Data

- **`ExpiredCategoriesData`** - Collection of expired categories
- **`ExpiredCategoryData`** - Single expired category mapping

## Usage Examples

### Working with InventoryItemData

```php
use Sashalenz\EbayApi\Requests\Sell\Inventory\InventoryItem\GetInventoryItemRequest;

$item = GetInventoryItemRequest::make('SKU-123')->asData();

// Access type-safe properties
echo $item->sku; // string
echo $item->product?->title; // ?string
echo $item->condition; // string (enum value)
echo $item->availability?->shipToLocationAvailability?->quantity; // ?int
```

### Working with OfferData

```php
use Sashalenz\EbayApi\Requests\Sell\Inventory\Offer\GetOfferRequest;

$offer = GetOfferRequest::make('12345')->asData();

echo $offer->offerId;
echo $offer->sku;
echo $offer->pricingSummary?->price?->value;
echo $offer->pricingSummary?->price?->currency;
echo $offer->status; // PUBLISHED, UNPUBLISHED, etc.
```

### Working with CategoryTreeData

```php
use Sashalenz\EbayApi\Requests\Commerce\Taxonomy\CategoryTree\GetCategoryTreeRequest;

$tree = GetCategoryTreeRequest::make('0')->asData();

echo $tree->categoryTreeId;
echo $tree->categoryTreeVersion;

// Navigate recursive structure
$rootNode = $tree->rootCategoryNode;
foreach ($rootNode->childCategoryTreeNodes ?? [] as $child) {
    echo $child->category?->categoryName;
    
    // Access nested children
    foreach ($child->childCategoryTreeNodes ?? [] as $grandChild) {
        echo "- {$grandChild->category?->categoryName}";
    }
}
```

### Working with Collections

All collection responses support iteration:

```php
$items = GetInventoryItemsRequest::make()->asData();

// Iterate over InventoryItemsData
foreach ($items->inventoryItems ?? [] as $item) {
    echo "{$item->sku}: {$item->product?->title}";
}

// Pagination
echo "Total: {$items->total}";
echo "Offset: {$items->offset}";
```

## Type Safety

All Data objects provide:

- ✅ **Full type hints** on all properties
- ✅ **Nullable properties** clearly marked with `?`
- ✅ **Nested Data objects** for complex structures
- ✅ **DataCollection** support for arrays
- ✅ **Enum integration** for type-safe constants
- ✅ **Automatic validation** via Spatie Laravel Data

## IDE Support

All Data objects include full PHPDoc annotations, providing excellent IDE autocomplete and type checking support.

