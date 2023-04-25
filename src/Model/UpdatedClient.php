<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Model;

/**
 * Updated Client.
 */
class UpdatedClient
{
    /**
     * @var boolean
     */
    private bool $error;

    /**
     * @param array $response Response.
     */
    public function __construct(array $response)
    {
        $this->error = (bool)$response['error'] ?? false;
    }

    /**
     * @return boolean
     */
    public function hasError(): bool
    {
        return $this->error;
    }
}
