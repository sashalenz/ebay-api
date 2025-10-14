<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Analytics;

use Sashalenz\EbayApi\Data\Sell\Analytics\SellerStandardsProfileData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Seller Standards Profile Request
 *
 * Retrieves a specific set of performance metrics for a seller's account based on a program and evaluation period (cycle).
 *
 * Programs:
 * - PROGRAM_DE - Germany eBay program
 * - PROGRAM_UK - United Kingdom eBay program
 * - PROGRAM_US - United States eBay program
 * - PROGRAM_GLOBAL - Global eBay program
 *
 * Cycles: CURRENT, PROJECTED, LAST_CYCLE, etc.
 */
class GetSellerStandardsProfileRequest extends Request
{
    protected string $method = 'GET';

    protected ?string $dataClass = SellerStandardsProfileData::class;

    public function __construct(
        protected string $program,
        protected string $cycle,
    ) {}

    /**
     * Create request instance
     */
    public static function make(string $program, string $cycle): static
    {
        return new static($program, $cycle);
    }

    public function resolveEndpoint(): string
    {
        return "/sell/analytics/v1/seller_standards_profile/{$this->program}/{$this->cycle}";
    }
}
