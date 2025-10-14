<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\Schedule;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Schedule Request
 *
 * Deletes an existing schedule.
 */
class DeleteScheduleRequest extends Request
{
    protected string $scheduleId;

    public function __construct(?EbayClient $client, string $scheduleId)
    {
        parent::__construct($client);
        $this->scheduleId = $scheduleId;
    }

    public function endpoint(): string
    {
        return "/sell/feed/v1/schedule/{$this->scheduleId}";
    }

    public function method(): string
    {
        return 'DELETE';
    }
}
