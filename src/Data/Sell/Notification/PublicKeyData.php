<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Notification;

use Spatie\LaravelData\Data;

/**
 * Public Key Data
 *
 * Public key for validating notification message payloads.
 */
class PublicKeyData extends Data
{
    public function __construct(
        public ?string $key = null,
        public ?string $jwe = null,
        public ?string $algorithm = null,
    ) {}
}
