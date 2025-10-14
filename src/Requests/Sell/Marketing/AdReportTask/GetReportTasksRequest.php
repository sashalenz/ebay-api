<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Marketing\AdReportTask;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

class GetReportTasksRequest extends Request
{
    protected ?int $limit = null;

    protected ?int $offset = null;

    protected ?string $reportTaskStatuses = null;

    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function limit(int $limit): self
    {
        $this->limit = $limit;

        return $this;
    }

    public function offset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    public function reportTaskStatuses(string $reportTaskStatuses): self
    {
        $this->reportTaskStatuses = $reportTaskStatuses;

        return $this;
    }

    public function endpoint(): string
    {
        return '/sell/marketing/v1/ad_report_task';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [];

        if ($this->limit !== null) {
            $query['limit'] = $this->limit;
        }

        if ($this->offset !== null) {
            $query['offset'] = $this->offset;
        }

        if ($this->reportTaskStatuses !== null) {
            $query['report_task_statuses'] = $this->reportTaskStatuses;
        }

        return $query;
    }
}
