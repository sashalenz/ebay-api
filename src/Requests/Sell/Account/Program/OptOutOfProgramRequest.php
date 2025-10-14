<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Account\Program;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Opt Out Of Program Request
 *
 * Opts the seller out of the specified eBay seller program.
 */
class OptOutOfProgramRequest extends Request
{
    protected string $programType;

    public function __construct(?EbayClient $client, string $programType)
    {
        parent::__construct($client);
        $this->programType = $programType;
    }

    public function endpoint(): string
    {
        return '/sell/account/v1/program/opt_out';
    }

    public function method(): string
    {
        return 'POST';
    }

    public function body(): array
    {
        return [
            'programType' => $this->programType,
        ];
    }
}
