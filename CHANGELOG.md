# Changelog

All notable changes to `ebay-api` will be documented in this file.

## 3.0.0 - 2025-10-14

### Added
- **📮 Post-Order API**: Complete implementation (42/42 methods - 100%)
  - **Cancellation Resource (7)**: Complete order cancellation workflow (approve, reject, confirm, search)
  - **Case Management Resource (10)**: Handle disputes - INR (Item Not Received), SNAD (Significantly Not As Described) with evidence submission, refunds, appeals
  - **Return Resource (20)**: Complete return management with shipping labels, drafts, file uploads, preferences
  - **Inquiry Resource (5)**: Buyer inquiries before escalating to cases
  - Excluding 10 deprecated methods (will be decommissioned in 2026)
- **User OAuth Token Support**: New authentication mechanism for user-specific APIs
  - `AuthInterface` - Common interface for authentication
  - `UserToken` - OAuth Authorization Code flow with automatic refresh
  - `EbayClient::setUserToken()` - Switch between Application and User tokens
  - Required for Post-Order API and Identity API
- **Data Objects (16)**: `CancellationData`, `CancelRequestData`, `CancellationSearchResultData`, `CancellationEligibilityData`, `CaseData`, `CaseDetailData`, `CaseSearchResultData`, `AppealData`, `ReturnData`, `ReturnRequestData`, `ReturnSearchResultData`, `ReturnDraftData`, `ReturnFileData`, `ShippingLabelData`, `InquiryData`, `InquirySearchResultData`

### Breaking Changes
- `ApplicationToken` now implements `AuthInterface`
- `EbayClient::$auth` property type changed from `ApplicationToken` to `AuthInterface`

### Summary
- **Total APIs**: 18 (16 Sell APIs + 1 Commerce API + 1 Post-Order API)
- **Total Request Classes**: 344 (+42)
- **Total Data Objects**: 190 (+16)
- **Total Enums**: 35
- **Total Events**: 10 notification events
- **Total API Methods**: 336 (+42)

## 2.5.0 - 2025-10-14

### Added
- **👤 Sell Identity API**: Complete implementation (1/1 method - 100%)
  - **User Profile (1)**: `GetUserRequest` - Get authenticated user's account profile for OAuth login
  - ⚠️ **Important**: Requires User OAuth Token (not Application Token)
  - Returns: username, userId, individual/business account info based on scopes
  - Use cases: "Login with eBay", OAuth authorization, retrieve PII with proper scopes
- **Data Objects (4)**: `UserData`, `IndividualAccountData`, `BusinessAccountData`, `AddressData`

### Summary
- **Total APIs**: 17 (16 Sell APIs + 1 Commerce API)
- **Total Request Classes**: 302 (+1)
- **Total Data Objects**: 174 (+4)
- **Total Enums**: 35
- **Total Events**: 10 notification events
- **Total API Methods**: 294 (+1)

## 2.4.0 - 2025-10-14

### Added
- **⚖️ Sell Compliance API**: Complete implementation (2/2 methods - 100%)
  - **Listing Violations Summary (1)**: `GetListingViolationsSummaryRequest` - Monitor compliance health by type
  - **Listing Violations (1)**: `GetListingViolationsRequest` - Get detailed violations with corrective recommendations
  - Supports 9+ compliance types: PRODUCT_ADOPTION, RETURN_POLICY, OUTSIDE_EBAY_BUYING_AND_SELLING, HTTPS_IMAGE_ISSUES, PRODUCT_SAFETY, CBSN, LOW_QUALITY_IMAGES, MISSING_ITEM_SPECIFICS, PRODUCT_AUTHENTICITY
  - Pagination support (up to 200 results per page)
  - Filter by listing ID or marketplace
- **Data Objects (7)**: `ListingViolationsSummaryData`, `ComplianceSummaryData`, `PagedComplianceViolationCollectionData`, `ComplianceViolationData`, `ComplianceDetailData`, `CorrectiveRecommendationData`, `ComplianceRecommendationValueData`

### Summary
- **Total APIs**: 16 (15 Sell APIs + 1 Commerce API)
- **Total Request Classes**: 301 (+2)
- **Total Data Objects**: 170 (+7)
- **Total Enums**: 35
- **Total Events**: 10 notification events
- **Total API Methods**: 293 (+2)

## 2.3.0 - 2025-10-14

### Added
- **🌐 Sell Translation API**: Complete implementation (1/1 method - 100%)
  - **Translation (1)**: `TranslateRequest` - Translate item titles/descriptions between 7 languages (en, de, fr, it, es, zh-Hans, zh-Hant)
  - Supports context: ITEM_TITLE, ITEM_DESCRIPTION
  - Translation context: BUYER, SELLER
  - Batch translation support (multiple texts at once)
- **Data Objects (2)**: `TranslationData`, `TranslatedTextData`

### Summary
- **Total APIs**: 15 (14 Sell APIs + 1 Commerce API)
- **Total Request Classes**: 299 (+1)
- **Total Data Objects**: 163 (+2)
- **Total Enums**: 35
- **Total Events**: 10 notification events
- **Total API Methods**: 291 (+1)

## 2.2.0 - 2025-10-14

### Added
- **📈 Sell Analytics API**: Complete implementation (4/4 methods - 100%)
  - **Customer Service Metrics (1)**: `GetCustomerServiceMetricRequest` - Performance benchmarks vs peer group
  - **Seller Standards Profile (2)**: `FindSellerStandardsProfilesRequest`, `GetSellerStandardsProfileRequest` - Detailed account performance metrics
  - **Traffic Reports (1)**: `GetTrafficReportRequest` - Buyer engagement analytics with impressions, clicks, conversion rates
- **Data Objects (14)**: `CustomerServiceMetricData`, `SellerStandardsProfileData`, `TrafficReportData`, `DimensionData`, `MetricData`, `BenchmarkData`, `EvaluationCycleData`, `CycleData`, `StandardsProfileData`, `RecordData`, `MetricDistributionData`, `DistributionData`, `MetadataData`, `FindSellerStandardsProfilesResponseData`

### Summary
- **Total APIs**: 14 (13 Sell APIs + 1 Commerce API)
- **Total Request Classes**: 298 (+4)
- **Total Data Objects**: 161 (+14)
- **Total Enums**: 35
- **Total Events**: 10 notification events
- **Total API Methods**: 290

## 2.1.0 - 2025-10-13

### Added
- **📡 Platform Notifications**: Complete SOAP webhook system for real-time eBay event processing
  - Webhook endpoint for receiving eBay Platform Notifications
  - Database storage with `ebay_notifications` table
  - Queue-based async processing with retry logic (3 attempts)
  - 10 Laravel Events for major notification types
  - Optional MD5 signature validation for security
  - Timestamp validation to prevent replay attacks
  - GDPR compliance support via `MarketplaceAccountDeletionEvent`
- **Events (10)**: `ItemListedEvent`, `ItemSoldEvent`, `ItemEndedEvent`, `ItemRevisedEvent`, `FeedbackReceivedEvent`, `OrderCreatedEvent`, `OrderCancelledEvent`, `MarketplaceAccountDeletionEvent`, `BuyerRequestedPurchaseQuoteEvent`, `ItemAvailabilityEvent`
- **Model**: `EbayNotification` with scopes for querying (unprocessed, failed, by event name)
- **Job**: `ProcessEbayNotificationJob` for async processing with exponential backoff
- **Service**: `NotificationParser` for SOAP parsing, signature validation, and event data extraction
- **Controller**: `NotificationController` for webhook endpoint
- **Enum**: `NotificationEventType` with 30+ eBay event types
- **Exception**: `InvalidNotificationSignatureException` for security validation failures
- Automatic route registration at configurable path (default: `/ebay/notifications`)
- Comprehensive configuration via `.env` variables
- Full documentation with setup guide and event handler examples

### Configuration
- `EBAY_NOTIFICATIONS_ENABLED` - Enable/disable webhook endpoint
- `EBAY_NOTIFICATIONS_ROUTE` - Custom webhook path
- `EBAY_NOTIFICATIONS_VALIDATE_SIGNATURE` - Enable signature validation
- `EBAY_NOTIFICATIONS_QUEUE` - Queue name for processing
- `EBAY_NOTIFICATIONS_STORE_DB` - Store notifications in database

### Summary
- **Total Request Classes**: 294
- **Total Data Objects**: 147
- **Total Enums**: 35 (+1 NotificationEventType)
- **Total Events**: 10 notification events
- **Total Models**: 1 (EbayNotification)
- **Total Jobs**: 1 (ProcessEbayNotificationJob)

## 2.0.0 - 2025-10-13

### Added
- **🎯 Sell Marketing API**: Complete implementation (81/81 methods - 100%)
  - **Campaigns (19)**: Complete campaign management with CRUD, lifecycle control, cloning, budget/bidding updates, and AI suggestions
  - **Ads (16)**: Full ad management including bulk operations for creating, deleting, and updating ads by listing ID or inventory reference
  - **Ad Groups (6)**: PLA ad group management with bid and keyword suggestions
  - **Keywords (6)**: Keyword management with bulk operations for PLA campaigns
  - **Negative Keywords (6)**: Negative keyword management with bulk operations
  - **Promotions (12)**: Item promotions, price markdown sales, pause/resume, and listing set management
  - **Reports (9)**: Ad performance reports, metadata, task management, and promotion reports
  - **Email Campaign (8)**: Store email campaign management with audience targeting and previews
- **💡 Sell Recommendation API**: Complete implementation (1/1 method)
  - `FindListingRecommendationsRequest` - AI-powered listing optimization and bid suggestions for Promoted Listings
- **Marketing Data Objects (11)**: `CampaignData`, `CampaignsData`, `AdData`, `AdsData`, `PromotionData`, `PromotionsData`, `AdGroupData`, `KeywordData`, `NegativeKeywordData`, `ReportData`, `EmailCampaignData`, `ListingRecommendationData`, `PagedListingRecommendationCollectionData`
- **Marketing Enums (7)**: `CampaignStatus`, `CampaignCriterionType`, `FundingStrategy`, `PromotionStatus`, `PromotionType`, `AdStatus`, `EmailCampaignStatus`
- Comprehensive support for Promoted Listings ad campaigns
- Bulk operations for efficient ad management (up to 25 items per request)
- Full promotion lifecycle management (create, pause, resume, update, delete)
- Complete PLA (Product Listing Ads) support with keywords and negative keywords
- Full email marketing capabilities for eBay Stores

### Breaking Changes
- Major version bump due to significant API expansion
- Package now covers 13 eBay APIs instead of 11

### Summary
- **Total Request Classes**: 295
- **Total Data Objects**: 147
- **Total Enums**: 34
- **Total APIs Covered**: 13
- **Complete APIs**: 13 (100%)

## 1.8.0 - 2025-10-13

### Added
- **💬 Sell Negotiation API**: Complete implementation (2/2 methods)
  - `FindEligibleItemsRequest` - Find listings eligible for seller-initiated discount offers
  - `SendOfferToInterestedBuyersRequest` - Send discount offers to buyers who showed interest
- **Negotiation Data Objects (3)**: `EligibleItemData`, `PagedEligibleItemCollectionData`, `SendOfferResponseData`
- Builder pattern for sending offers with discount percentage or fixed price
- Validation for offer requirements (at least one item, either discount or price, message length)
- Pagination support for finding eligible items

### Summary
- **Total Request Classes**: 211
- **Total Data Objects**: 134
- **Total Enums**: 27

## 1.7.0 - 2025-10-13

### Added
- **🔔 Sell Notification API**: Complete implementation (21/21 methods)
  - Configuration: `GetConfigRequest`, `UpdateConfigRequest`
  - Destinations: `CreateDestinationRequest`, `GetDestinationRequest`, `GetDestinationsRequest`, `UpdateDestinationRequest`, `DeleteDestinationRequest`
  - Subscriptions: `CreateSubscriptionRequest`, `GetSubscriptionRequest`, `GetSubscriptionsRequest`, `UpdateSubscriptionRequest`, `DeleteSubscriptionRequest`, `EnableSubscriptionRequest`, `DisableSubscriptionRequest`, `TestSubscriptionRequest`
  - Subscription Filters: `CreateSubscriptionFilterRequest`, `GetSubscriptionFilterRequest`, `DeleteSubscriptionFilterRequest`
  - Topics: `GetTopicRequest`, `GetTopicsRequest`
  - Public Keys: `GetPublicKeyRequest`
- **Notification Data Objects (9)**: `ConfigData`, `DestinationData`, `DestinationsData`, `SubscriptionData`, `SubscriptionsData`, `SubscriptionFilterData`, `TopicData`, `TopicsData`, `PublicKeyData`
- Full notification management for eBay push notifications with filtering and testing capabilities
- Documentation updates with Notification API examples

### Summary
- **Total Request Classes**: 209
- **Total Data Objects**: 131
- **Total Enums**: 27

## 1.6.0 - 2025-10-13

### Added
- **🚚 Sell Logistics API**: Complete implementation (6/6 methods) - Limited Release API
  - Shipping Quotes: `CreateShippingQuoteRequest`, `GetShippingQuoteRequest`
  - Shipments: `CreateFromShippingQuoteRequest`, `GetShipmentRequest`, `CancelShipmentRequest`, `DownloadLabelFileRequest`
- **Logistics Data Objects (3)**: `ShippingQuoteData`, `RateData`, `ShipmentData`
- Builder pattern for Logistics requests
- Documentation updates with Logistics API examples

### Fixed
- **OAuth Scope Issue**: Fixed `invalid_scope` error by simplifying to base scope
  - Removed multiple scopes that were causing authentication failures
  - Made scopes configurable via `EBAY_OAUTH_SCOPES` env variable
  - Added documentation about OAuth scopes in README
  - Updated `ApplicationToken`, `EbayClient`, `EbayApiServiceProvider`, and test helpers

### Summary
- **Total Request Classes**: 188
- **Total Data Objects**: 122
- **Total Enums**: 27

## 1.5.0 - 2025-10-13

### Added
- **📦 Sell Fulfillment API**: Complete implementation (15/15 methods)
  - Orders: `GetOrderRequest`, `GetOrdersRequest`, `IssueRefundRequest`
  - Shipping Fulfillment: `CreateShippingFulfillmentRequest`, `GetShippingFulfillmentRequest`, `GetShippingFulfillmentsRequest`
  - Payment Disputes: `GetPaymentDisputeRequest`, `GetPaymentDisputeSummariesRequest`, `GetActivitiesRequest`, `FetchEvidenceContentRequest`, `ContestPaymentDisputeRequest`, `AcceptPaymentDisputeRequest`, `UploadEvidenceFileRequest`, `AddEvidenceRequest`, `UpdateEvidenceRequest`
- **Fulfillment Data Objects (9)**: `OrderData`, `OrdersData`, `LineItemData`, `ShippingFulfillmentData`, `ShippingFulfillmentsData`, `PaymentDisputeData`, `PaymentDisputeSummariesData`, `DisputeActivityData`, `ActivityData`
- Builder pattern for all Fulfillment requests with filtering and search capabilities
- Documentation updates with Fulfillment API examples

### Summary
- **Total Request Classes**: 182
- **Total Data Objects**: 119
- **Total Enums**: 27

## 1.4.0 - 2025-10-13

### Added
- **💰 Sell Finances API**: Complete implementation (7/7 methods)
  - Payouts: `GetPayoutRequest`, `GetPayoutsRequest`, `GetPayoutSummaryRequest`
  - Transactions: `GetTransactionsRequest`, `GetTransactionSummaryRequest`
  - Funds & Transfers: `GetSellerFundsSummaryRequest`, `GetTransferRequest`
- **Finances Data Objects (8)**: `PayoutData`, `PayoutsData`, `PayoutSummaryData`, `SellerFundsSummaryData`, `TransactionData`, `TransactionsData`, `TransactionSummaryData`, `TransferData`
- Builder pattern for all Finances requests with filtering, sorting, and pagination
- Documentation updates with Finances API examples

### Summary
- **Total Request Classes**: 167
- **Total Data Objects**: 110
- **Total Enums**: 27

## 1.3.0 - 2025-10-13

### Added
- **⚙️ Sell Account API v1**: Complete implementation (36/36 methods)
  - Fulfillment Policies: 6 methods for managing shipping/fulfillment policies
  - Payment Policies: 6 methods for managing payment policies
  - Return Policies: 6 methods for managing return policies
  - Custom Policies: 4 methods for Product Compliance and Takeback policies
  - Sales Tax: 4 methods for managing sales tax configurations
  - Programs: 3 methods for seller program opt-in/opt-out
  - Other: 7 methods (payments program, privileges, rate tables, subscription, KYC, advertising)
- **⚙️ Sell Account API v2**: Complete implementation (4/4 methods)
  - Rate Tables: 2 methods for managing shipping rate tables
  - Payout Settings: 2 methods for split-payout configuration (mainland China)
- **Account Data Objects (12)**: `FulfillmentPolicyData`, `FulfillmentPoliciesData`, `PaymentPolicyData`, `PaymentPoliciesData`, `ReturnPolicyData`, `ReturnPoliciesData`, `CustomPolicyData`, `CustomPoliciesData`, `SalesTaxData`, `SalesTaxesData`, `ProgramData`, `ProgramsData`
- All Account requests support marketplace-specific configurations
- Documentation updates with Account API examples

### Summary
- **Total Request Classes**: 160
- **Total Data Objects**: 102
- **Total Enums**: 27

## 1.2.0 - 2025-10-13

### Added
- **💝 Sell Charity API**: Complete implementation (2/2 methods)
  - `GetCharityOrgRequest` - Get details of a specific charitable organization
  - `GetCharityOrgsRequest` - Search charitable organizations by name or registration ID
- **Charity Data Objects (3)**: `CharityOrgData`, `CharityOrgsData`, `LocationData`
- Builder pattern for `GetCharityOrgsRequest` with search and filtering
- Documentation updates with Charity API examples

### Summary
- **Total Request Classes**: 120
- **Total Data Objects**: 90
- **Total Enums**: 27

## 1.1.0 - 2025-10-13

### Added
- **🔍 Sell Metadata API**: Complete implementation (22/22 methods)
  - Marketplace Policies: 16 methods for policies, conditions, and configurations
  - Compatibility Data: 5 methods for product compatibility information
  - Sales Tax: 1 method for tax jurisdictions
- **Metadata Data Objects (4)**: `AutomotivePartsCompatibilityPolicyData`, `CategoryPolicyData`, `SalesTaxJurisdictionData`, `SalesTaxJurisdictionItemData`
- All Metadata requests support filtering and marketplace-specific configurations
- Documentation updates with Metadata API examples

### Summary
- **Total Request Classes**: 118
- **Total Data Objects**: 87
- **Total Enums**: 27

## 1.0.0 - 2025-10-13

### Added
- **📋 Sell Feed API**: Complete implementation (23/23 methods)
  - Order Tasks: `CreateOrderTaskRequest`, `GetOrderTaskRequest`, `GetOrderTasksRequest`
  - Inventory Tasks: `CreateInventoryTaskRequest`, `GetInventoryTaskRequest`, `GetInventoryTasksRequest`
  - Generic Tasks: `CreateTaskRequest`, `GetTaskRequest`, `GetTasksRequest`, `UploadFileRequest`, `GetInputFileRequest`, `GetResultFileRequest`
  - Schedules: `CreateScheduleRequest`, `GetScheduleRequest`, `GetSchedulesRequest`, `UpdateScheduleRequest`, `DeleteScheduleRequest`, `GetLatestResultFileRequest`, `GetScheduleTemplateRequest`, `GetScheduleTemplatesRequest`
  - Customer Service Metrics: `CreateCustomerServiceMetricTaskRequest`, `GetCustomerServiceMetricTaskRequest`, `GetCustomerServiceMetricTasksRequest`
- **Feed Data Objects (6)**: `TaskData`, `TaskCollectionData`, `ScheduleData`, `ScheduleCollectionData`, `ScheduleTemplateData`, `ScheduleTemplateCollectionData`
- **Feed Enums (3)**: `FeedType`, `TaskStatus`, `ScheduleStatus`
- Builder pattern for all Feed API requests with fluent filter methods
- Documentation updates with Feed API examples

### Summary
- **Total Request Classes**: 96
- **Total Data Objects**: 86
- **Total Enums**: 27

## 0.9.0 - 2025-10-13

### Added
- **🛒 Sell Catalog API**: Complete implementation (2/2 methods)
  - `GetProductRequest` - Get details of a specific eBay catalog product by EPID
  - `SearchProductsRequest` - Search catalog products with multiple filters (query, GTIN, MPN, brand, category, aspects)
- **Catalog Data Objects (5)**: `ProductData`, `ProductSummaryData`, `ProductSearchResponseData`, `ProductImageData`, `ProductAspectData`
- Builder pattern for `SearchProductsRequest` with fluent filter methods
- Fixed `DataCollection` usage - now only used for Data objects, arrays for primitives
- Documentation updates with Catalog API examples

### Summary
- **Total Request Classes**: 73
- **Total Data Objects**: 77
- **Total Enums**: 24

## 0.8.0 - 2025-10-13

### Added
- **🤖 Inventory Mapping API (GraphQL)**: AI-powered listing creation (2/2 methods)
- **📦 Stores API**: Complete implementation (8/8 methods)
- **📷 Commerce Media API**: Complete implementation (10/10 methods)
  - Image: `CreateImageFromFileRequest`, `CreateImageFromUrlRequest`, `GetImageRequest`
  - Video: `CreateVideoRequest`, `GetVideoRequest`, `UploadVideoRequest`
  - Document: `CreateDocumentRequest`, `CreateDocumentFromUrlRequest`, `GetDocumentRequest`, `UploadDocumentRequest`
- **Media Data Objects (3)**: `ImageData`, `VideoData`, `DocumentData`
  - Store Management: `GetStoreRequest`, `GetStoreCategoriesRequest`
  - Category Operations: `AddStoreCategoryRequest`, `DeleteStoreCategoryRequest`, `RenameStoreCategoryRequest`, `MoveStoreCategoryRequest`
  - Task Management: `GetStoreTaskRequest`, `GetStoreTasksRequest`
- **Stores Data Objects (5)**: `StoreData`, `StoreCategoryData`, `StoreCategoriesData`, `StoreTaskData`, `StoreTasksData`
- **Stores Tests (15)**: Comprehensive tests for all Stores API methods
- **Validation**: AddStoreCategory and RenameStoreCategory validate name length (max 35 chars)

## 0.7.0 - 2025-10-13

### Added
- **🧪 Complete Test Suite**: 112 comprehensive tests covering all 49 Request classes
  - **Test Factories**: 3 factories for complex Data objects (InventoryItem, Offer, Location)
  - **JSON Fixtures**: 8 mock API responses for realistic testing
  - **MocksApiResponses Trait**: Helper methods for mocking Guzzle responses
  - **Validation Tests**: Comprehensive validation scenarios for all validated Request classes
  - **Builder Pattern Tests**: Full coverage of fluent interfaces
  - **Data Mapping Tests**: Verification of automatic Data object mapping
  - **Endpoint Tests**: Verification of correct endpoint building

### Test Coverage
- **InventoryItem**: 16 tests (validation, builder, endpoint, data mapping)
- **Offer**: 22 tests (all 12 Request classes with validation, builder, dto)
- **Location**: 10 tests (full location management)
- **InventoryItemGroup**: 5 tests (builder, validation)
- **ProductCompatibility**: 4 tests (builder, validation)
- **Listing**: 4 tests (bulk operations)
- **Taxonomy**: 12 tests (all 12 methods)
- **Validation**: 39 tests (comprehensive validation scenarios)

## 0.6.0 - 2025-10-13

### Changed
- **🏗️ Builder Pattern Implementation**: All 26 complex Request classes now use fluent Builder Pattern
  - **Type-Safe**: All properties now use Data objects and Enums instead of arrays
  - **Chainable**: Fluent interface for building requests
  - **IDE Support**: Full autocomplete and type hints
  - **Discoverable**: Easy to find all available options
  - **Validation**: Automatic validation before sending requests
  
### Refactored Request Classes (26)
- **InventoryItem (4)**: `CreateOrReplaceInventoryItemRequest`, `BulkCreateOrReplaceInventoryItemRequest`, `BulkGetInventoryItemRequest`, `BulkUpdatePriceQuantityRequest`
- **Offer (7)**: `CreateOfferRequest`, `UpdateOfferRequest`, `BulkCreateOfferRequest`, `BulkPublishOfferRequest`, `GetListingFeesRequest`, `PublishOfferByInventoryItemGroupRequest`, `WithdrawOfferByInventoryItemGroupRequest`
- **Location (2)**: `CreateInventoryLocationRequest`, `UpdateInventoryLocationRequest`
- **InventoryItemGroup (1)**: `CreateOrReplaceInventoryItemGroupRequest`
- **ProductCompatibility (3)**: `CreateOrReplaceProductCompatibilityRequest`, `DeleteProductCompatibilityRequest`, `GetProductCompatibilityRequest`
- **Listing (2)**: `BulkMigrateListingRequest`, `CreateOrReplaceSkuLocationMappingRequest`

### Added
- **ValidationException**: New exception type for request validation errors
- **Automatic Validation**: All Request classes now validate required fields before sending
  - `CreateOrReplaceInventoryItemRequest`: Validates product, condition, availability
  - `CreateOfferRequest`: Validates pricingSummary, listingPolicies, categoryId
  - `CreateInventoryLocationRequest`: Validates name, location, locationTypes
  - Bulk operations: Validate minimum/maximum item limits (25 max)
- **Validation Tests**: Comprehensive test suite for validation logic
- **Builder Pattern Examples**: New `BUILDER_PATTERN_EXAMPLES.md` with comprehensive usage examples
- **Enhanced Documentation**: Updated README.md with Builder Pattern and validation examples

### Breaking Changes
- Request classes constructors now accept typed parameters instead of generic arrays
- Example: `CreateOfferRequest::make($sku, MarketplaceId::EBAY_US, 'FIXED_PRICE')` instead of `make($client, $data)`

## 0.5.0 - 2025-10-13

### Added
- **Complete Data Structure**: Added 30 new Data objects for all Inventory API resources (total 43 for Inventory)
- **Automatic Data Mapping**: All GET requests now automatically map responses to typed Data objects
- **Type-Safe Response Handling**: Full type safety across entire Inventory API
- New documentation: `DATA_OBJECTS.md` - comprehensive reference for all 64 Data objects

### Changed
- All Request classes now include `dto()` method for automatic Data mapping
- Enhanced documentation with complete Data object coverage

## 0.4.0 - 2025-10-13

### Added
- **Sell Inventory API - Complete**: All 35 methods across all resources
  - **InventoryItem (7/7)**: Get, GetAll, Create, Delete, BulkCreate, BulkGet, BulkUpdate
  - **ProductCompatibility (3/3)**: Get, Create, Delete
  - **InventoryItemGroup (3/3)**: Get, Create, Delete
  - **Location (7/7)**: Get, GetAll, Create, Update, Delete, Enable, Disable
  - **Listing (4/4)**: BulkMigrate, GetMapping, CreateMapping, DeleteMapping
  - **Offer (11/11)**: Get, GetAll, Create, Update, Delete, Publish, Withdraw, PublishGroup, WithdrawGroup, BulkCreate, BulkPublish, GetFees
- **Inventory Data objects (43)**: Complete data structure for all Inventory API resources
  - **InventoryItem**: `InventoryItemData`, `InventoryItemsData`, `ProductData`, `AvailabilityData`, `ShipToLocationAvailabilityData`, `PickupAtLocationAvailabilityData`, `FormatAllocationData`, `AvailabilityDistributionData`, `ConditionDescriptorData`, `PackageWeightAndSizeData`, `DimensionData`, `WeightData`, `TimeDurationData`
  - **Offer**: `OfferData`, `OffersData`, `PricingSummaryData`, `AmountData`, `ListingPoliciesData`, `TaxData`, `CharityData`, `ExtendedProducerResponsibilityData`, `ListingDescriptionData`, `PublishResponseData`, `WithdrawResponseData`, `FeeData`, `FeeSummaryData`, `ListingFeesData`
  - **Location**: `InventoryLocationData`, `InventoryLocationsData`, `LocationData`, `AddressData`, `GeoCoordinatesData`, `OperatingHoursData`, `IntervalData`, `SpecialHoursData`
  - **InventoryItemGroup**: `InventoryItemGroupData`, `VariesByData`
  - **ProductCompatibility**: `ProductCompatibilityData`, `CompatibilityData`, `NameValueData`
  - **Listing**: `BulkMigrateListingResponseData`, `MigrationData`, `BulkResponseData`
- **Inventory Enums**: `Condition`, `Locale`, `AvailabilityType`, `PackageType`, `LengthUnitOfMeasure`, `WeightUnitOfMeasure`, `TimeDurationUnit`
- **Automatic Data Mapping**: All GET requests automatically map API responses to typed Data objects
- **Full Category Tree Data Structure**: Complete recursive Data objects matching eBay API specification
- `CategoryTreeNodeData` with full recursive support for child nodes
- `AncestorReferenceData` for category ancestry tracking in suggestions
- **Taxonomy API Methods** (all 9 category_tree methods):
  - `GetDefaultCategoryTreeIdRequest` - Get default category tree ID for marketplace
  - `GetCategorySuggestionsRequest` - Get category suggestions for a query
  - `GetCategoryTreeRequest` - Get the complete category tree
  - `GetCategorySubtreeRequest` - Get subtree below a specific category
  - `GetItemAspectsForCategoryRequest` - Get aspects for a specific leaf category
  - `GetCompatibilityPropertiesRequest` - Get compatible vehicle properties for parts categories
  - `GetCompatibilityPropertyValuesRequest` - Get values for compatibility property with filters
  - `GetExpiredCategoriesRequest` - Get mappings of expired categories to active replacements
  - `FetchItemAspectsRequest` - Fetch item aspects (gzipped response)
- Data objects: `BaseCategoryTreeData`, `CategorySubtreeData`, `AspectMetadataData`, `GetCompatibilityMetadataData`, `CompatibilityPropertyData`, `GetCompatibilityPropertyValuesData`, `CompatibilityPropertyValueData`, `ExpiredCategoriesData`, `ExpiredCategoryData`, `GetCategoriesAspectData`, `CategoryAspectData`, `AspectData`, `AspectConstraintData`, `AspectValueData`, `ValueConstraintData`, `RelevanceIndicatorData`
- **All Taxonomy Request classes moved to CategoryTree namespace** for better organization
- Aspect-related Enums: `AspectApplicableTo`, `AspectDataType`, `AspectMode`, `AspectUsage`, `ItemToAspectCardinality`, `AspectAdvancedDataType`

### Changed
- Updated `CategoryTreeData` to use `CategoryTreeNodeData` instead of array
- Updated `CategoryTreeData::applicableMarketplaceIds` to use `array<MarketplaceId>` type
- Updated `CategorySuggestionData` with DataCollection for ancestors
- Enhanced all Data objects with PHPDoc and type hints per eBay API spec

## 0.3.0 - 2025-10-13

### Added
- **Automatic Client Injection**: Client is now auto-injected via Laravel Container
- `make()` static factory method on all Request classes for cleaner syntax
- AUTO_INJECTION.md documentation with examples

### Changed
- All Request constructors now accept optional `$client` parameter (defaults to null)
- `$client` is automatically resolved from container when null
- **Breaking (but backward compatible)**: You can now omit `$client` when creating requests
- Updated all documentation with new auto-injection examples

### Improved Developer Experience
- Before: `(new GetInventoryItemRequest($client, 'SKU-123'))->asData()`
- After: `GetInventoryItemRequest::make('SKU-123')->asData()` ✨

## 0.2.0 - 2025-10-13

### Added
- Automatic response mapping to Data objects via `asData()` method
- `asCollection()` method for forcing collection responses
- `Response::data()` method for manual Data mapping
- `Response::collect()` method for manual collection mapping
- `dto()` method in Request classes to define Data class
- `dtoKey()` method in Request classes to extract nested data
- Comprehensive Data mapping documentation (DATA_MAPPING.md)
- Support for automatic detection of single vs collection responses

### Changed
- All existing Request classes now support automatic Data mapping
- Updated documentation with Data mapping examples
- Enhanced type safety across all requests

## 0.1.0 - 2025-10-12

- Initial release
- OAuth 2.0 Application Token authentication
- Support for eBay Sell API (Inventory)
- Support for eBay Commerce API (Taxonomy)
- Laravel Data integration for type-safe responses
- Multi-marketplace support
- Comprehensive error handling
- Full test coverage

