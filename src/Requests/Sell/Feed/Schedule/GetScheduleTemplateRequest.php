<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\Schedule;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Feed\ScheduleTemplateData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Schedule Template Request
 *
 * Retrieves details of the specified template.
 */
class GetScheduleTemplateRequest extends Request
{
    protected string $scheduleTemplateId;

    public function __construct(?EbayClient $client, string $scheduleTemplateId)
    {
        parent::__construct($client);
        $this->scheduleTemplateId = $scheduleTemplateId;
    }

    public function endpoint(): string
    {
        return "/sell/feed/v1/schedule_template/{$this->scheduleTemplateId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return ScheduleTemplateData::class;
    }
}
