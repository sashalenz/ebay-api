<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Analytics;

use Spatie\LaravelData\Data;

/**
 * Cycle Data
 *
 * Contains evaluation cycle period information.
 */
class CycleData extends Data
{
    public function __construct(
        public ?string $cycleType,
        public ?string $evaluationDate,
        public ?string $evaluationMonth,
    ) {}
}
