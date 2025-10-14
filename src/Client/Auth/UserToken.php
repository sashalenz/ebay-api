<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Client\Auth;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Cache;
use Sashalenz\EbayApi\Enums\Environment;
use Sashalenz\EbayApi\Exceptions\AuthenticationException;

/**
 * User Token Manager
 *
 * Handles OAuth 2.0 User (Authorization Code) tokens with automatic refresh.
 * User tokens are required for accessing user-specific data like Post-Order API.
 *
 * Note: This class manages existing tokens. The OAuth authorization flow
 * (redirect, callback) must be implemented in your application.
 */
class UserToken implements AuthInterface
{
    protected string $appId;

    protected string $certId;

    protected Environment $environment;

    protected string $accessToken;

    protected string $refreshToken;

    protected int $expiresAt;

    protected ?string $cacheKey;

    /**
     * Create a new User Token instance
     *
     * @param  string  $appId  eBay Application ID (Client ID)
     * @param  string  $certId  eBay Certificate ID (Client Secret)
     * @param  Environment  $environment  API environment (sandbox or production)
     * @param  string  $accessToken  Current access token
     * @param  string  $refreshToken  Refresh token for getting new access tokens
     * @param  int  $expiresAt  Unix timestamp when token expires
     * @param  string|null  $cacheKey  Custom cache key (defaults to user-specific key)
     */
    public function __construct(
        string $appId,
        string $certId,
        Environment $environment,
        string $accessToken,
        string $refreshToken,
        int $expiresAt,
        ?string $cacheKey = null
    ) {
        $this->appId = $appId;
        $this->certId = $certId;
        $this->environment = $environment;
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->expiresAt = $expiresAt;
        $this->cacheKey = $cacheKey;
    }

    /**
     * Get a valid access token (auto-refresh if expired)
     *
     * @throws AuthenticationException
     */
    public function getToken(): string
    {
        // Check if token is expired or about to expire (5 min buffer)
        if ($this->isTokenExpired()) {
            $this->refreshAccessToken();
        }

        return $this->accessToken;
    }

    /**
     * Check if the access token is expired
     */
    protected function isTokenExpired(): bool
    {
        // Add 5 minute buffer
        return time() >= ($this->expiresAt - 300);
    }

    /**
     * Refresh the access token using refresh token
     *
     * @throws AuthenticationException
     */
    protected function refreshAccessToken(): void
    {
        if (empty($this->appId) || empty($this->certId) || empty($this->refreshToken)) {
            throw AuthenticationException::invalidCredentials();
        }

        $client = new Client([
            'base_uri' => $this->environment->oauthBaseUrl(),
            'timeout' => 30,
        ]);

        try {
            $response = $client->post('/identity/v1/oauth2/token', [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Basic '.base64_encode($this->appId.':'.$this->certId),
                ],
                'form_params' => [
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $this->refreshToken,
                ],
            ]);

            $data = json_decode((string) $response->getBody(), true);

            if (! isset($data['access_token'])) {
                throw AuthenticationException::tokenGenerationFailed('No access token in response');
            }

            // Update tokens
            $this->accessToken = $data['access_token'];
            $this->expiresAt = time() + ($data['expires_in'] ?? 7200);

            // Update refresh token if provided (some OAuth flows return new refresh token)
            if (isset($data['refresh_token'])) {
                $this->refreshToken = $data['refresh_token'];
            }

            // Update cache if cache key is set
            if ($this->cacheKey) {
                $this->updateCache();
            }
        } catch (GuzzleException $e) {
            throw AuthenticationException::tokenGenerationFailed($e->getMessage());
        }
    }

    /**
     * Update cached token data
     */
    protected function updateCache(): void
    {
        if (! $this->cacheKey) {
            return;
        }

        Cache::put($this->cacheKey, [
            'access_token' => $this->accessToken,
            'refresh_token' => $this->refreshToken,
            'expires_at' => $this->expiresAt,
        ], now()->addSeconds(7200));
    }

    /**
     * Get the refresh token
     */
    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    /**
     * Get token expiration timestamp
     */
    public function getExpiresAt(): int
    {
        return $this->expiresAt;
    }

    /**
     * Clear the cached token
     */
    public function clearToken(): void
    {
        if ($this->cacheKey) {
            Cache::forget($this->cacheKey);
        }
    }
}
