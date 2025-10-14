<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Analytics;

use Sashalenz\EbayApi\Data\Sell\Analytics\TrafficReportData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Traffic Report Request
 *
 * Generates a customized traffic report for a seller's listings based on search criteria.
 * Returns data showing how buyers are engaging with listings (impressions, clicks, conversion rates, etc.).
 *
 * Dimensions:
 * - DAY - Daily breakdown
 * - LISTING - By listing ID
 *
 * Metrics:
 * - CLICK_THROUGH_RATE - Percentage of views that resulted in clicks
 * - LISTING_IMPRESSION_TOTAL - Total impressions
 * - LISTING_VIEWS_TOTAL - Total views
 * - SALES_CONVERSION_RATE - Percentage of views that resulted in sales
 * - TRANSACTION - Total transactions
 */
class GetTrafficReportRequest extends Request
{
    protected string $method = 'GET';

    protected ?string $dataClass = TrafficReportData::class;

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
        return '/sell/analytics/v1/traffic_report';
    }

    /**
     * Set dimension (DAY or LISTING)
     */
    public function dimension(string $dimension): static
    {
        return $this->withQueryParam('dimension', $dimension);
    }

    /**
     * Set filter expression
     * Example: "listingIds:{L1|L2|L3}"
     */
    public function filter(string $filter): static
    {
        return $this->withQueryParam('filter', $filter);
    }

    /**
     * Set metric keys (comma-separated)
     * Example: "CLICK_THROUGH_RATE,LISTING_IMPRESSION_TOTAL"
     */
    public function metric(string $metric): static
    {
        return $this->withQueryParam('metric', $metric);
    }

    /**
     * Set sort parameter
     * Example: "LISTING_IMPRESSION_TOTAL"
     */
    public function sort(string $sort): static
    {
        return $this->withQueryParam('sort', $sort);
    }
}
