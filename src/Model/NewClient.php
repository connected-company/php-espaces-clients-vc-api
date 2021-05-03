<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Model;

/**
 * Nouveau Client.
 */
class NewClient
{
    /**
     * @var boolean
     */
    private bool $error;

    /**
     * @var string|null
     */
    private string $id;

    /**
     * @param array $response Response.
     */
    public function __construct(array $response)
    {
        $this->error = (bool)$response['error'] ?? false;
        $this->id = (string)$response['data']['id'] ?? null;
    }

    /**
     * @return boolean
     */
    public function hasError(): bool
    {
        return $this->error;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }
}
