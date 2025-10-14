<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\Schedule;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Feed\ScheduleData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Create Schedule Request
 *
 * Configures and creates a schedule for generating reports.
 */
class CreateScheduleRequest extends Request
{
    protected string $scheduleTemplateId;

    protected string $scheduleName;

    protected ?string $preferredTriggerDayOfWeek = null;

    protected ?string $preferredTriggerHour = null;

    protected ?string $preferredTriggerDayOfMonth = null;

    public function __construct(?EbayClient $client, string $scheduleTemplateId, string $scheduleName)
    {
        parent::__construct($client);
        $this->scheduleTemplateId = $scheduleTemplateId;
        $this->scheduleName = $scheduleName;
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
        return '/sell/feed/v1/schedule';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        $body = [
            'scheduleTemplateId' => $this->scheduleTemplateId,
            'scheduleName' => $this->scheduleName,
        ];

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

    protected function dto(): ?string
    {
        return ScheduleData::class;
    }
}
