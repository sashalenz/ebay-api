<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Account;

use Spatie\LaravelData\Data;

/**
 * Program Data
 *
 * eBay seller program information.
 */
class ProgramData extends Data
{
    public function __construct(
        public ?string $programType = null,
        public ?string $programStatus = null,
    ) {}
}
