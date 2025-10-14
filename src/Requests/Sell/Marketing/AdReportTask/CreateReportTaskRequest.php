<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\AdReportTask;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class CreateReportTaskRequest extends Request
{
    protected array $reportTaskData;

    public function __construct(?EbayClient $client, array $reportTaskData)
    {
        parent::__construct($client);
        $this->reportTaskData = $reportTaskData;
    }

    public function endpoint(): string
    {
        return '/sell/marketing/v1/ad_report_task';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return $this->reportTaskData;
    }
}
