<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Notification;

use Spatie\LaravelData\Data;

/**
 * Topic Data
 *
 * Notification topic information.
 */
class TopicData extends Data
{
    public function __construct(
        public ?string $topicId = null,
        public ?string $description = null,
        public ?array $supportedSchemaVersions = null,
        public ?array $supportedPayloads = null,
        public ?string $authorizationScopesSupported = null,
    ) {}
}
