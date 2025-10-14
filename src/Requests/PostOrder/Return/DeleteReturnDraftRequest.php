<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\PostOrder\Return;

use Sashalenz\EbayApi\Requests\Request;

/**
 * Delete Return Draft Request
 *
 * Delete a draft return request.
 */
class DeleteReturnDraftRequest extends Request
{
    protected string $method = 'DELETE';

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
