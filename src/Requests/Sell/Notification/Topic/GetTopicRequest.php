<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Notification\Topic;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Notification\TopicData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Topic Request
 *
 * Retrieves details of a notification topic.
 */
class GetTopicRequest extends Request
{
    protected string $topicId;

    public function __construct(?EbayClient $client, string $topicId)
    {
        parent::__construct($client);
        $this->topicId = $topicId;
    }

    public function endpoint(): string
    {
        return "/sell/notification/v1/topic/{$this->topicId}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return TopicData::class;
    }
}
