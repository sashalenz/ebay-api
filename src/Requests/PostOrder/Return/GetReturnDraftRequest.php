<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Data\PostOrder\Return\ReturnDraftData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Return Draft Request
 *
 * Retrieve a draft return request.
 */
class GetReturnDraftRequest extends Request
{
    protected string $method = 'GET';

    protected ?string $dataClass = ReturnDraftData::class;

    public function __construct(
        protected string $draftId,
    ) {}

    public static function make(string $draftId): static
    {
        return new static($draftId);
    }

    public function resolveEndpoint(): string
    {
        return "/post-order/v2/return/draft/{$this->draftId}";
    }
}
