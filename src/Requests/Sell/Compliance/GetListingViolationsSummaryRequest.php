<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Compliance;

use Sashalenz\EbayApi\Data\Sell\Compliance\ListingViolationsSummaryData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Listing Violations Summary Request
 *
 * Returns a count of listing violations for a seller, grouped by compliance type.
 * Use this to monitor the overall health of your listings and identify problem areas.
 *
 * Compliance types:
 * - PRODUCT_ADOPTION - Missing product adoption
 * - RETURN_POLICY - Return policy issues
 * - OUTSIDE_EBAY_BUYING_AND_SELLING - Attempting to complete transaction outside eBay
 * - HTTPS_IMAGE_ISSUES - Images not using HTTPS
 * - PRODUCT_SAFETY - Product safety concerns
 * - CBSN - Canada Buyer Services Number required
 * - LOW_QUALITY_IMAGES - Image quality issues
 * - MISSING_ITEM_SPECIFICS - Required item specifics missing
 * - PRODUCT_AUTHENTICITY - Product authenticity concerns
 *
 * Example:
 * ```php
 * $summary = GetListingViolationsSummaryRequest::make()
 *     ->complianceType('PRODUCT_ADOPTION')
 *     ->asData();
 * ```
 */
class GetListingViolationsSummaryRequest extends Request
{
    protected string $method = 'GET';

    protected ?string $dataClass = ListingViolationsSummaryData::class;

    public function __construct() {}

    /**
     * Create request instance
     */
    public static function make(): static
    {
        return new static;
    }

    public function resolveEndpoint(): string
    {
        return '/sell/compliance/v1/listing_violation_summary';
    }

    /**
     * Filter by compliance type
     */
    public function complianceType(string $complianceType): static
    {
        return $this->withQueryParam('compliance_type', $complianceType);
    }
}
