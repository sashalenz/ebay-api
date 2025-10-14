<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\AdReportTask;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class DeleteReportTaskRequest extends Request
{
    protected string $reportTaskId;

    public function __construct(?EbayClient $client, string $reportTaskId)
    {
        parent::__construct($client);
        $this->reportTaskId = $reportTaskId;
    }

    public function endpoint(): string
    {
        return "/sell/marketing/v1/ad_report_task/{$this->reportTaskId}";
    }

    public function method(): string
    {
        return 'DELETE';
    }
}
