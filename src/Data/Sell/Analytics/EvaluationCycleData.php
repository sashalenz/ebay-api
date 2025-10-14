<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Analytics;

use Spatie\LaravelData\Data;

/**
 * Evaluation Cycle Data
 *
 * Contains evaluation period information.
 */
class EvaluationCycleData extends Data
{
    public function __construct(
        public ?string $evaluationDate,
        public ?string $evaluationType,
        public ?string $evaluationMonth,
    ) {}
}
