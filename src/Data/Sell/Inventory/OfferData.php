<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Inventory;

use Sashalenz\EbayApi\Enums\OfferFormat;
use Sashalenz\EbayApi\Enums\OfferStatus;
use Spatie\LaravelData\Data;

/**
 * Offer Data
 *
 * Represents a complete offer for an inventory item.
 */
class OfferData extends Data
{
    public function __construct(
        public ?string $offerId = null,
        public ?string $sku = null,
        public ?string $marketplaceId = null,
        public ?OfferFormat $format = null,
        public ?int $availableQuantity = null,
        public ?string $categoryId = null,
        public ?CharityData $charity = null,
        public ?bool $includeCatalogProductDetails = null,
        public ?ListingDescriptionData $listing = null,
        public ?ListingPoliciesData $listingPolicies = null,
        public ?string $listingStartDate = null,
        public ?string $listingDuration = null,
        public ?int $lotSize = null,
        public ?string $merchantLocationKey = null,
        public ?PricingSummaryData $pricingSummary = null,
        public ?int $quantityLimitPerBuyer = null,
        public ?array $secondaryCategoryId = null,
        public ?bool $storeCategoryNames = null,
        public ?TaxData $tax = null,
        public ?string $listingId = null,
        public ?OfferStatus $status = null,
        public ?ExtendedProducerResponsibilityData $extendedProducerResponsibility = null,
        public ?bool $hideBuyerDetails = null,
    ) {}
}
