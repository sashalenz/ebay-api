<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Analytics;

use Sashalenz\EbayApi\Data\Sell\Analytics\FindSellerStandardsProfilesResponseData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Find Seller Standards Profiles Request
 *
 * Retrieves detailed performance metrics for a seller's account.
 * This includes information about the seller's service level, defect rate, and other performance indicators.
 */
class FindSellerStandardsProfilesRequest extends Request
{
    protected string $method = 'GET';

    protected ?string $dataClass = FindSellerStandardsProfilesResponseData::class;

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
        return '/sell/analytics/v1/seller_standards_profile';
    }
}
