<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Commerce\Catalog;

use Sashalenz\EbayApi\Client\EbayClient;
use Sashalenz\EbayApi\Data\Commerce\Catalog\ProductData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get Product Request
 *
 * Retrieves the details of a specific eBay catalog product by EPID.
 */
class GetProductRequest extends Request
{
    protected string $epid;

    public function __construct(?EbayClient $client, string $epid)
    {
        parent::__construct($client);
        $this->epid = $epid;
    }

    public function endpoint(): string
    {
        return "/sell/catalog/v1_beta/product/{$this->epid}";
    }

    public function method(): string
    {
        return 'GET';
    }

    protected function dto(): ?string
    {
        return ProductData::class;
    }
}
