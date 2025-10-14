<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Feed\Schedule;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Feed\ScheduleTemplateCollectionData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Schedule Templates Request
 *
 * Retrieves the details and status of schedule templates based on the specified feed type.
 */
class GetScheduleTemplatesRequest extends Request
{
    protected string $feedType;

    protected ?int $limit = null;

    protected ?int $offset = null;

    public function __construct(?EbayClient $client, string $feedType)
    {
        parent::__construct($client);
        $this->feedType = $feedType;
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

    public function endpoint(): string
    {
        return '/sell/feed/v1/schedule_template';
    }

    public function method(): string
    {
        return 'GET';
    }

    public function query(): array
    {
        $query = [
            'feed_type' => $this->feedType,
        ];

        if ($this->limit !== null) {
            $query['limit'] = $this->limit;
        }

        if ($this->offset !== null) {
            $query['offset'] = $this->offset;
        }

        return $query;
    }

    protected function dto(): ?string
    {
        return ScheduleTemplateCollectionData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'scheduleTemplates';
    }
}
