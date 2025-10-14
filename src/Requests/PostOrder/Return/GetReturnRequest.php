<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Data\PostOrder\Return\ReturnData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Return Request
 *
 * Retrieve the details of a return request.
 */
class GetReturnRequest extends Request
{
    protected string $method = 'GET';

    protected ?string $dataClass = ReturnData::class;

    public function __construct(
        protected string $returnId,
    ) {}

    public static function make(string $returnId): static
    {
        return new static($returnId);
    }

    public function resolveEndpoint(): string
    {
        return "/post-order/v2/return/{$this->returnId}";
    }

    public function fieldGroups(string $fieldGroups): static
    {
        return $this->withQueryParam('fieldgroups', $fieldGroups);
    }
}
