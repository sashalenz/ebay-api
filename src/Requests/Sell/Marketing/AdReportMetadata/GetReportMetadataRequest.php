<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\AdReportMetadata;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class GetReportMetadataRequest extends Request
{
    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function endpoint(): string
    {
        return '/sell/marketing/v1/ad_report_metadata';
    }

    public function method(): string
    {
        return 'GET';
    }
}
