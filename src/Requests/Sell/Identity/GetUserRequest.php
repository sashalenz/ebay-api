<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Requests\Sell\Identity;

use Sashalenz\EbayApi\Data\Sell\Identity\UserData;
use Sashalenz\EbayApi\Requests\Request;

/**
 * Get User Request
 *
 * Retrieves the authenticated user's account profile information.
 *
 * ⚠️ IMPORTANT: This endpoint requires a USER OAuth Token (not Application Token).
 * It is used for OAuth login scenarios where users authenticate through eBay.
 *
 * The returned information depends on the OAuth scopes granted:
 * - https://api.ebay.com/oauth/api_scope/sell.account - Basic account info
 * - https://api.ebay.com/oauth/api_scope/sell.account.readonly - Read-only account info
 *
 * Use cases:
 * - OAuth login ("Login with eBay")
 * - Retrieve user profile after authorization
 * - Get user's eBay ID and username
 * - Access PII (Personal Identifiable Information) with proper scopes
 *
 * Example:
 * ```php
 * // Note: Requires User Token, not Application Token
 * $user = GetUserRequest::make()->asData();
 *
 * echo "Username: {$user->username}\n";
 * echo "User ID: {$user->userId}\n";
 *
 * if ($user->individualAccount) {
 *     foreach ($user->individualAccount as $account) {
 *         echo "Name: {$account->firstName} {$account->lastName}\n";
 *         echo "Email: {$account->email}\n";
 *     }
 * }
 * ```
 *
 * @see https://developer.ebay.com/api-docs/sell/identity/resources/user/methods/getUser
 */
class GetUserRequest extends Request
{
    protected string $method = 'GET';

    protected ?string $dataClass = UserData::class;

    public function __construct() {}

    /**
     * Create request instance
     */
    public static function make(): static
    {
        return new static;
    }

    public function resolveEndpoint(): string
    {
        return '/sell/identity/v1/user/';
    }
}
