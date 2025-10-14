<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Finances\Payout;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Finances\PayoutSummaryData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Payout Summary Request
 *
 * Retrieves the total count and values of a seller's payouts.
 */
class GetPayoutSummaryRequest extends Request
{
    protected ?string $filter = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function filter(string $filter): self
    {
        $this->filter = $filter;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/finances/v1/payout_summary';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->filter !== null) {
            $query['filter'] = $this->filter;
        }

        return $query;
    }

    protected function dto(): ?string
    {
        return PayoutSummaryData::class;
    }
}
