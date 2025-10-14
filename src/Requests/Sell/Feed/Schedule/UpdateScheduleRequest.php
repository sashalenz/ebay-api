<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\Schedule;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Enums\ScheduleStatus;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Update Schedule Request
 *
 * Updates an existing schedule for a given schedule ID.
 */
class UpdateScheduleRequest extends Request
{
    protected string $scheduleId;

    protected ?string $scheduleName = null;

    protected ?ScheduleStatus $status = null;

    protected ?string $preferredTriggerDayOfWeek = null;

    protected ?string $preferredTriggerHour = null;

    protected ?string $preferredTriggerDayOfMonth = null;

    public function __construct(?EbayClient $client, string $scheduleId)
    {
        parent::__construct($client);
        $this->scheduleId = $scheduleId;
    }

    public function scheduleName(string $scheduleName): self
    {
        $this->scheduleName = $scheduleName;

        return $this;
    }

    public function status(ScheduleStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function preferredTriggerDayOfWeek(string $preferredTriggerDayOfWeek): self
    {
        $this->preferredTriggerDayOfWeek = $preferredTriggerDayOfWeek;

        return $this;
    }

    public function preferredTriggerHour(string $preferredTriggerHour): self
    {
        $this->preferredTriggerHour = $preferredTriggerHour;

        return $this;
    }

    public function preferredTriggerDayOfMonth(string $preferredTriggerDayOfMonth): self
    {
        $this->preferredTriggerDayOfMonth = $preferredTriggerDayOfMonth;

        return $this;
    }

    public function endpoint(): string
    {
        return "/sell/feed/v1/schedule/{$this->scheduleId}";
    }

    public function method(): string
    {
        return 'PUT';
    }

    public function body(): array
    {
        $body = [];

        if ($this->scheduleName !== null) {
            $body['scheduleName'] = $this->scheduleName;
        }

        if ($this->status !== null) {
            $body['status'] = $this->status->value;
        }

        if ($this->preferredTriggerDayOfWeek !== null) {
            $body['preferredTriggerDayOfWeek'] = $this->preferredTriggerDayOfWeek;
        }

        if ($this->preferredTriggerHour !== null) {
            $body['preferredTriggerHour'] = $this->preferredTriggerHour;
        }

        if ($this->preferredTriggerDayOfMonth !== null) {
            $body['preferredTriggerDayOfMonth'] = $this->preferredTriggerDayOfMonth;
        }

        return $body;
    }
}
