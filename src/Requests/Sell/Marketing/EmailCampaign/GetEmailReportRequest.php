<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\EmailCampaign;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class GetEmailReportRequest extends Request
{
    protected string $dateFrom;

    protected string $dateTo;

    public function __construct(?EbayClient $client, string $dateFrom, string $dateTo)
    {
        parent::__construct($client);
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
    }

    public function endpoint(): string
    {
        return '/sell/marketing/v1/email_campaign/report';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        return [
            'date_from' => $this->dateFrom,
            'date_to' => $this->dateTo,
        ];
    }
}
