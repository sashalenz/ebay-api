<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\PostOrder\Cancellation;

use Spatie\LaravelData\Data;

/**
 * Cancellation Eligibility Data
 *
 * Contains eligibility check result for order cancellation.
 */
class CancellationEligibilityData extends Data
{
    public function __construct(
        public ?bool $eligible,
        public ?string $reason,
    ) {}
}
