<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Model;

use Connected\EspaceClientVC\Enum\AppIdentifierEnum;
use Connected\EspaceClientVC\Enum\ContratTypeEnum;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Modèle de données pour les contrats des EC V&C.
 */
class Contrat
{
    /**
     * @Serializer\Groups({"espace_client"})
     * @var ContratTypeEnum
     */
    private ContratTypeEnum $type;

    /**
     * @var array
     */
    private array $identifiers = [];

    /**
     * @Serializer\Groups({"espace_client"})
     * @var array
     */
    private array $flags = [];

    /**
     * Constructor.
     *
     * @param ContratTypeEnum $type ContratTypeEnum.
     */
    public function __construct(ContratTypeEnum $type)
    {
        $this->type = $type;
    }

    /**
     * Type.
     *
     * @return ContratTypeEnum
     */
    public function getType(): ContratTypeEnum
    {
        return $this->type;
    }

    /**
     * Ajout d'un FlagData.
     *
     * @param FlagData $flag FlagData.
     *
     * @return self
     */
    public function addFlagData(FlagData $flag): self
    {
        $this->flags[] = $flag;

        return $this;
    }

    /**
     * Retourne un array de flags.
     *
     * @return array
     */
    public function getFlags(): array
    {
        return $this->flags;
    }

    /**
     * Ajout d'un identifiant.
     *
     * @param AppIdentifierEnum $appIdentifier Identifier key.
     * @param string|integer    $id            Identifier value.
     *
     * @return self
     */
    public function addIdentifier(AppIdentifierEnum $appIdentifier, string|int $id): self
    {
        $this->identifiers[$appIdentifier->getValue()] = (string)$id;

        return $this;
    }

    /**
     * Ajout d'un identifiant.
     *
     * @Serializer\Groups({"espace_client"})
     * @return array
     */
    public function getIdentifiers(): array {
        $identifiers = [];

        foreach ($this->identifiers as $key => $identifier) {
            $identifiers[] = [
                "name" => $key, "value" => $identifier
            ];
        }

        return $identifiers;
    }
}
