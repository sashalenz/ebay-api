<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\PromotionSummaryReport;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class GetPromotionSummaryReportRequest extends Request
{
    protected string $marketplaceId;

    public function __construct(?EbayClient $client, string $marketplaceId)
    {
        parent::__construct($client);
        $this->marketplaceId = $marketplaceId;
    }

    public function endpoint(): string
    {
        return '/sell/marketing/v1/promotion_summary_report';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        return ['marketplace_id' => $this->marketplaceId];
    }
}
