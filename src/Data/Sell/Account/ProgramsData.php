<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Data\Sell\Account;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * Programs Data
 *
 * Collection of seller programs.
 */
class ProgramsData extends Data
{
    public function __construct(
        #[DataCollectionOf(ProgramData::class)]
        public ?DataCollection $programs = null,
    ) {}
}
