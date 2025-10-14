<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\Program;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Sell\Account\ProgramsData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Opted In Programs Request
 *
 * Retrieves a list of seller programs that the seller has opted in to.
 */
class GetOptedInProgramsRequest extends Request
{
    public function __construct(?EbayClient $client = null)
    {
        parent::__construct($client);
    }

    public function endpoint(): string
    {
        return '/sell/account/v1/program/get_opted_in_programs';
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return ProgramsData::class;
    }

    protected function dtoKey(): ?string
    {
        return 'programs';
    }
}
