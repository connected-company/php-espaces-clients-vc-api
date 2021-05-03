<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Model;

use Connected\EspaceClientVC\Contract\ClientInterface;

/**
 * Modèle pour configurer une demande de données.
 */
class Client implements ClientInterface
{
    /**
     * @param string $email Email.
     * @param string $nom Nom.
     * @param string $prenom Prenom.
     * @param string $telephonePortable Telephone Portable.
     * @param string|null $firstEntite First Entite.
     */
    public function __construct(
        private string $email,
        private string $nom,
        private string $prenom,
        private string $telephonePortable,
        private ?string $firstEntite
    ) {
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @return string
     */
    public function getTelephonePortable(): string
    {
        return $this->telephonePortable;
    }

    /**
     * @return string|null
     */
    public function getFirstEntite(): ?string
    {
        return $this->firstEntite;
    }
}
