<?php

declare(strict_types=1);

namespace Sashalenz\EbayApi\Exceptions;

use Psr\Http\Message\ResponseInterface;

/**
 * Request exception
 *
 * Thrown when an API request fails or returns an error response
 */
class RequestException extends EbayApiException
{
    protected ?ResponseInterface $response = null;

    protected array $errors = [];

    /**
     * Create a new request exception from a response
     */
    public static function fromResponse(ResponseInterface $response): self
    {
        $body = (string) $response->getBody();
        $data = json_decode($body, true);

        $message = 'eBay API request failed with status '.$response->getStatusCode();

        $exception = new self($message, $response->getStatusCode());
        $exception->response = $response;

        if (isset($data['errors']) && is_array($data['errors'])) {
            $exception->errors = $data['errors'];

            if (! empty($data['errors'])) {
                $firstError = $data['errors'][0];
                $errorMessage = $firstError['message'] ?? $firstError['longMessage'] ?? '';

                if ($errorMessage) {
                    $exception->message .= ': '.$errorMessage;
                }
            }
        }

        return $exception;
    }

    /**
     * Create a new request exception for a network error
     */
    public static function networkError(string $message): self
    {
        return new self('Network error: '.$message);
    }

    /**
     * Get the response object
     */
    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }

    /**
     * Get the error details from the response
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
