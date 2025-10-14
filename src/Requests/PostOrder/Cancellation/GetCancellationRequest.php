<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Cancellation;

use Sashalenz\EbayApi\Data\PostOrder\Cancellation\CancellationData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Cancellation Request
 *
 * Retrieve the details of an order cancellation request.
 */
class GetCancellationRequest extends Request
{
    protected string $method = 'GET';

    protected ?string $dataClass = CancellationData::class;

    public function __construct(
        protected string $cancelId,
    ) {}

    public static function make(string $cancelId): static
    {
        return new static($cancelId);
    }

    public function resolveEndpoint(): string
    {
        return "/post-order/v2/cancellation/{$this->cancelId}";
    }
}
