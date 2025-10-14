<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Inventory\Offer;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Inventory\CharityData;
use Sashalenz\EbayApi\Data\Sell\Inventory\ExtendedProducerResponsibilityData;
use Sashalenz\EbayApi\Data\Sell\Inventory\ListingDescriptionData;
use Sashalenz\EbayApi\Data\Sell\Inventory\ListingPoliciesData;
use Sashalenz\EbayApi\Data\Sell\Inventory\OfferData;
use Sashalenz\EbayApi\Data\Sell\Inventory\PricingSummaryData;
use Sashalenz\EbayApi\Data\Sell\Inventory\TaxData;
use Sashalenz\EbayApi\Enums\MarketplaceId;
use Sashalenz\EbayApi\Enums\OfferFormat;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Offer Request
 *
 * Creates an offer for an inventory item on a specific marketplace.
 */
class CreateOfferRequest extends Request
{
    protected string $sku;

    protected MarketplaceId $marketplaceId;

    protected OfferFormat $format;

    protected ?int $availableQuantity = null;

    protected ?string $categoryId = null;

    protected ?CharityData $charity = null;

    protected ?bool $includeCatalogProductDetails = null;

    protected ?ListingDescriptionData $listing = null;

    protected ?ListingPoliciesData $listingPolicies = null;

    protected ?string $listingStartDate = null;

    protected ?string $listingDuration = null;

    protected ?int $lotSize = null;

    protected ?string $merchantLocationKey = null;

    protected ?PricingSummaryData $pricingSummary = null;

    protected ?int $quantityLimitPerBuyer = null;

    /** @var array<string> */
    protected array $secondaryCategoryId = [];

    protected ?bool $storeCategoryNames = null;

    protected ?TaxData $tax = null;

    protected ?ExtendedProducerResponsibilityData $extendedProducerResponsibility = null;

    protected ?bool $hideBuyerDetails = null;

    public function __construct(?EbayClient $client, string $sku, MarketplaceId $marketplaceId, OfferFormat $format)
    {
        parent::__construct($client);
        $this->sku = $sku;
        $this->marketplaceId = $marketplaceId;
        $this->format = $format;
    }

    public function availableQuantity(int $availableQuantity): self
    {
        $this->availableQuantity = $availableQuantity;

        return $this;
    }

    public function categoryId(string $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    public function charity(CharityData $charity): self
    {
        $this->charity = $charity;

        return $this;
    }

    public function includeCatalogProductDetails(bool $includeCatalogProductDetails): self
    {
        $this->includeCatalogProductDetails = $includeCatalogProductDetails;

        return $this;
    }

    public function listing(ListingDescriptionData $listing): self
    {
        $this->listing = $listing;

        return $this;
    }

    public function listingPolicies(ListingPoliciesData $listingPolicies): self
    {
        $this->listingPolicies = $listingPolicies;

        return $this;
    }

    public function listingStartDate(string $listingStartDate): self
    {
        $this->listingStartDate = $listingStartDate;

        return $this;
    }

    public function listingDuration(string $listingDuration): self
    {
        $this->listingDuration = $listingDuration;

        return $this;
    }

    public function lotSize(int $lotSize): self
    {
        $this->lotSize = $lotSize;

        return $this;
    }

    public function merchantLocationKey(string $merchantLocationKey): self
    {
        $this->merchantLocationKey = $merchantLocationKey;

        return $this;
    }

    public function pricingSummary(PricingSummaryData $pricingSummary): self
    {
        $this->pricingSummary = $pricingSummary;

        return $this;
    }

    public function quantityLimitPerBuyer(int $quantityLimitPerBuyer): self
    {
        $this->quantityLimitPerBuyer = $quantityLimitPerBuyer;

        return $this;
    }

    public function addSecondaryCategoryId(string $categoryId): self
    {
        $this->secondaryCategoryId[] = $categoryId;

        return $this;
    }

    public function secondaryCategoryIds(array $categoryIds): self
    {
        $this->secondaryCategoryId = $categoryIds;

        return $this;
    }

    public function storeCategoryNames(bool $storeCategoryNames): self
    {
        $this->storeCategoryNames = $storeCategoryNames;

        return $this;
    }

    public function tax(TaxData $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    public function extendedProducerResponsibility(ExtendedProducerResponsibilityData $extendedProducerResponsibility): self
    {
        $this->extendedProducerResponsibility = $extendedProducerResponsibility;

        return $this;
    }

    public function hideBuyerDetails(bool $hideBuyerDetails): self
    {
        $this->hideBuyerDetails = $hideBuyerDetails;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/inventory/v1/offer';
    }

    public function method(): string
    {
        return 'POST';
    }

    /**
     * Validate the request before sending
     *
     * @return array<string>
     */
    protected function validate(): array
    {
        $errors = [];

        if ($this->pricingSummary === null) {
            $errors[] = 'Pricing summary is required';
        }

        if ($this->listingPolicies === null) {
            $errors[] = 'Listing policies are required';
        }

        if ($this->categoryId === null) {
            $errors[] = 'Category ID is required';
        }

        return $errors;
    }

    public function body(): array
    {
        $body = [
            'sku' => $this->sku,
            'marketplaceId' => $this->marketplaceId->value,
            'format' => $this->format->value,
        ];

        if ($this->availableQuantity !== null) {
            $body['availableQuantity'] = $this->availableQuantity;
        }

        if ($this->categoryId !== null) {
            $body['categoryId'] = $this->categoryId;
        }

        if ($this->charity !== null) {
            $body['charity'] = $this->charity->toArray();
        }

        if ($this->includeCatalogProductDetails !== null) {
            $body['includeCatalogProductDetails'] = $this->includeCatalogProductDetails;
        }

        if ($this->listing !== null) {
            $body['listing'] = $this->listing->toArray();
        }

        if ($this->listingPolicies !== null) {
            $body['listingPolicies'] = $this->listingPolicies->toArray();
        }

        if ($this->listingStartDate !== null) {
            $body['listingStartDate'] = $this->listingStartDate;
        }

        if ($this->listingDuration !== null) {
            $body['listingDuration'] = $this->listingDuration;
        }

        if ($this->lotSize !== null) {
            $body['lotSize'] = $this->lotSize;
        }

        if ($this->merchantLocationKey !== null) {
            $body['merchantLocationKey'] = $this->merchantLocationKey;
        }

        if ($this->pricingSummary !== null) {
            $body['pricingSummary'] = $this->pricingSummary->toArray();
        }

        if ($this->quantityLimitPerBuyer !== null) {
            $body['quantityLimitPerBuyer'] = $this->quantityLimitPerBuyer;
        }

        if (! empty($this->secondaryCategoryId)) {
            $body['secondaryCategoryId'] = $this->secondaryCategoryId;
        }

        if ($this->storeCategoryNames !== null) {
            $body['storeCategoryNames'] = $this->storeCategoryNames;
        }

        if ($this->tax !== null) {
            $body['tax'] = $this->tax->toArray();
        }

        if ($this->extendedProducerResponsibility !== null) {
            $body['extendedProducerResponsibility'] = $this->extendedProducerResponsibility->toArray();
        }

        if ($this->hideBuyerDetails !== null) {
            $body['hideBuyerDetails'] = $this->hideBuyerDetails;
        }

        return $body;
    }

    protected function dto(): ?string
    {
        return OfferData::class;
    }
}
