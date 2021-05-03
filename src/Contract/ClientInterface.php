<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Contract;

/**
 * Interface pour les clients.
 */
interface ClientInterface
{
    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @return string
     */
    public function getNom(): string;

    /**
     * @return string
     */
    public function getPrenom(): string;

    /**
     * @return string
     */
    public function getTelephonePortable(): string;

    /**
     * @return string|null
     */
    public function getFirstEntite(): ?string;
}
