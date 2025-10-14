<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Analytics;

use Sashalenz\EbayApi\Data\Sell\Analytics\CustomerServiceMetricData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Customer Service Metric Request
 *
 * Retrieves the seller's customer service performance for the specified metric type and eBay marketplace.
 * The metrics are returned for the evaluation cycle ending on the specified date (or the most recent cycle if not specified).
 *
 * Metric types:
 * - ITEM_NOT_AS_DESCRIBED - Item not as described cases
 * - ITEM_NOT_RECEIVED - Item not received cases
 */
class GetCustomerServiceMetricRequest extends Request
{
    protected string $method = 'GET';

    protected ?string $dataClass = CustomerServiceMetricData::class;

    public function __construct(
        protected string $customerServiceMetricType,
        protected string $evaluationType,
    ) {}

    /**
     * Create request instance
     */
    public static function make(string $customerServiceMetricType, string $evaluationType): static
    {
        return new static($customerServiceMetricType, $evaluationType);
    }

    public function resolveEndpoint(): string
    {
        return "/sell/analytics/v1/customer_service_metric/{$this->customerServiceMetricType}/{$this->evaluationType}";
    }

    /**
     * Set evaluation marketplace ID
     */
    public function evaluationMarketplaceId(string $marketplaceId): static
    {
        return $this->withQueryParam('evaluation_marketplace_id', $marketplaceId);
    }
}
