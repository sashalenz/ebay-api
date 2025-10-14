<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Compliance;

use Sashalenz\EbayApi\Data\Sell\Compliance\PagedComplianceViolationCollectionData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Listing Violations Request
 *
 * Returns detailed information about listing violations for a specific compliance type.
 * Each violation includes the reason, affected listing details, and corrective recommendations.
 *
 * This is useful for:
 * - Identifying which listings need attention
 * - Understanding what needs to be fixed
 * - Getting specific recommendations for corrections
 * - Bulk fixing compliance issues
 *
 * Filters:
 * - compliance_type (required) - Type of violation to retrieve
 * - listing_id (optional) - Specific listing to check
 * - offset (optional) - Pagination offset
 * - limit (optional) - Results per page (max 200)
 *
 * Example:
 * ```php
 * $violations = GetListingViolationsRequest::make()
 *     ->complianceType('PRODUCT_ADOPTION')
 *     ->limit(50)
 *     ->asData();
 *
 * foreach ($violations->listingViolations as $violation) {
 *     echo "Listing: {$violation->listingId}\n";
 *     foreach ($violation->violations as $detail) {
 *         echo "Issue: {$detail->message}\n";
 *         foreach ($detail->correctiveRecommendations as $fix) {
 *             echo "Fix: {$fix->recommendationText}\n";
 *         }
 *     }
 * }
 * ```
 */
class GetListingViolationsRequest extends Request
{
    protected string $method = 'GET';

    protected ?string $dataClass = PagedComplianceViolationCollectionData::class;

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
        return '/sell/compliance/v1/listing_violation';
    }

    /**
     * Set compliance type (required)
     */
    public function complianceType(string $complianceType): static
    {
        return $this->withQueryParam('compliance_type', $complianceType);
    }

    /**
     * Filter by specific listing ID
     */
    public function listingId(string $listingId): static
    {
        return $this->withQueryParam('listing_id', $listingId);
    }

    /**
     * Set pagination offset
     */
    public function offset(int $offset): static
    {
        return $this->withQueryParam('offset', (string) $offset);
    }

    /**
     * Set results limit (max 200)
     */
    public function limit(int $limit): static
    {
        return $this->withQueryParam('limit', (string) $limit);
    }

    /**
     * Filter by marketplace
     */
    public function filter(string $filter): static
    {
        return $this->withQueryParam('filter', $filter);
    }
}
