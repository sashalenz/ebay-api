<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Types;

use Illuminate\Support\Collection;
use Psr\Http\Message\ResponseInterface;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

/**
 * API Response wrapper
 *
 * Wraps the Guzzle response and provides convenient methods for accessing response data.
 */
class Response
{
    protected ResponseInterface $response;

    protected ?array $data = null;

    /**
     * Create a new Response instance
     *
     * @param  ResponseInterface  $response  The Guzzle response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * Get the response status code
     */
    public function status(): int
    {
        return $this->response->getStatusCode();
    }

    /**
     * Check if the response was successful (2xx status code)
     */
    public function successful(): bool
    {
        return $this->status() >= 200 && $this->status() < 300;
    }

    /**
     * Check if the response was a client error (4xx status code)
     */
    public function clientError(): bool
    {
        return $this->status() >= 400 && $this->status() < 500;
    }

    /**
     * Check if the response was a server error (5xx status code)
     */
    public function serverError(): bool
    {
        return $this->status() >= 500;
    }

    /**
     * Get the response body as string
     */
    public function body(): string
    {
        return (string) $this->response->getBody();
    }

    /**
     * Get the response body as an array
     */
    public function json(): array
    {
        if ($this->data === null) {
            $this->data = json_decode($this->body(), true) ?? [];
        }

        return $this->data;
    }

    /**
     * Get a specific value from the response data
     */
    public function get(string $key, mixed $default = null): mixed
    {
        $data = $this->json();

        return data_get($data, $key, $default);
    }

    /**
     * Get the raw response headers
     */
    public function headers(): array
    {
        return $this->response->getHeaders();
    }

    /**
     * Get a specific header value
     */
    public function header(string $name): ?string
    {
        $headers = $this->response->getHeader($name);

        return ! empty($headers) ? $headers[0] : null;
    }

    /**
     * Get the underlying Guzzle response
     */
    public function toGuzzleResponse(): ResponseInterface
    {
        return $this->response;
    }

    /**
     * Convert to array
     */
    public function toArray(): array
    {
        return $this->json();
    }

    /**
     * Map response data to a Data object
     *
     * @template T of Data
     *
     * @param  class-string<T>  $dataClass  The Data class to map to
     * @param  string|null  $key  Optional key to extract from response before mapping
     * @return T|DataCollection<int, T>
     */
    public function data(string $dataClass, ?string $key = null): Data|DataCollection
    {
        $responseData = $key !== null ? $this->get($key, []) : $this->json();

        // If the response data is a list (indexed array), create a DataCollection
        if ($this->isIndexedArray($responseData)) {
            return new DataCollection($dataClass, $responseData);
        }

        // Otherwise, create a single Data object
        return $dataClass::from($responseData);
    }

    /**
     * Map response data to a collection of Data objects
     *
     * @template T of Data
     *
     * @param  class-string<T>  $dataClass  The Data class to map to
     * @param  string|null  $key  Optional key to extract from response before mapping
     * @return DataCollection<int, T>
     */
    public function collect(string $dataClass, ?string $key = null): DataCollection
    {
        $responseData = $key !== null ? $this->get($key, []) : $this->json();

        return new DataCollection($dataClass, $responseData);
    }

    /**
     * Check if array is indexed (not associative)
     */
    protected function isIndexedArray(mixed $array): bool
    {
        if (! is_array($array)) {
            return false;
        }

        if (empty($array)) {
            return false;
        }

        return array_keys($array) === range(0, count($array) - 1);
    }
}
