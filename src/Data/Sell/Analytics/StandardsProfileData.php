<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Analytics;

use Spatie\LaravelData\Data;

/**
 * Standards Profile Data
 *
 * Contains detailed standards profile information.
 */
class StandardsProfileData extends Data
{
    public function __construct(
        public ?string $evaluationReason,
        public ?string $level,
    ) {}
}
