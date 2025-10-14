<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Finances\SellerFundsSummary;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Finances\SellerFundsSummaryData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Seller Funds Summary Request
 *
 * Retrieves all pending funds that have not yet been distributed through a seller payout.
 */
class GetSellerFundsSummaryRequest extends Request
{
    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function endpoint(): string
    {
        return '/sell/finances/v1/seller_funds_summary';
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return SellerFundsSummaryData::class;
    }
}
