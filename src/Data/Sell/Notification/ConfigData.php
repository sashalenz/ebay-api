<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Notification;

use Spatie\LaravelData\Data;

/**
 * Config Data
 *
 * Notification configuration with alert email.
 */
class ConfigData extends Data
{
    public function __construct(
        public ?string $alertEmail = null,
    ) {}
}
