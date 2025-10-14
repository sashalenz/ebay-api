<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\AdReport;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Marketing\ReportData;
use Sashalenz\EbayApi\Requests\Request;

class GetReportRequest extends Request
{
    protected string $reportId;

    public function __construct(?EbayClient $client, string $reportId)
    {
        parent::__construct($client);
        $this->reportId = $reportId;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_report/{$this->reportId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return ReportData::class;
    }
}
