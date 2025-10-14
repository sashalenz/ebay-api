<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\AdReportMetadata;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class GetReportMetadataForReportTypeRequest extends Request
{
    protected string $reportType;

    public function __construct(?EbayClient $client, string $reportType)
    {
        parent::__construct($client);
        $this->reportType = $reportType;
    }

    public function endpoint(): string
    {
        return '/sell/marketing/v1/ad_report_metadata';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        return ['report_type' => $this->reportType];
    }
}
