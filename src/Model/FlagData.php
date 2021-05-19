<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Model;

use Connected\EspaceClientVC\Enum\FlagEnum;
use Connected\EspaceClientVC\Contract\FlagMetadataInterface;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * Données d'un flag.
 */
class FlagData
{
    /**
     * @Serializer\Groups({"espace_client"})
     * @var mixed
     */
    private mixed $value = null;

    /**
     * @Serializer\Groups({"espace_client"})
     * @var string|null
     */
    private ?string $date = null;

    /**
     * @Serializer\Groups({"espace_client"})
     * @var string|null
     */
    private ?string $metadata = null;

    /**
     * @Serializer\Groups({"espace_client"})
     * @var null
     */
    private ?string $displayName = null;

    /**
     * @Serializer\Groups({"espace_client"})
     * @var FlagEnum
     */
    private FlagEnum $flag;

    /**
     * @param FlagEnum $flag FlagEnum.
     */
    public function __construct(FlagEnum $flag)
    {
        $this->flag = $flag;
    }

    /**
     * @return string
     */
    public function getFlag(): string
    {
        return $this->flag->getValue();
    }

    /**
     * Valeur.
     *
     * @param mixed $value Value.
     *
     * @return self
     */
    public function setValue(mixed $value): self
    {
        if ($value instanceof \DateTime) {
            $value = $value->format('Y-m-d\TH:i:s.u\Z');
        }
        $this->value = $value;

        return $this;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * Période.
     * Le format atypique nous oblige à formatter la data immédiatement.
     *
     * @param \DateTime $start Start.
     * @param \DateTime $end End.
     *
     * @return self
     */
    public function setPeriode(\DateTime $start, \DateTime $end): self
    {
        $start = $start->format('Y-m-d\TH:i:s.u\Z');
        $end = $end->format('Y-m-d\TH:i:s.u\Z');

        $this->setValue($start . '_' . $end);

        return $this;
    }

    /**
     * Date.
     *
     * @param \DateTime $date Date.
     *
     * @return self
     */
    public function setDate(?\DateTime $date): self
    {
        if ($date) {
            $this->date = $date->format('Y-m-d\TH:i:s.u\Z');
        }

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * Metadata.
     *
     * @param FlagMetadataInterface $flagMetadata FlagMetadata.
     *
     * @return self
     */
    public function setMetadata(FlagMetadataInterface $flagMetadata): self
    {
        $this->metadata = $flagMetadata->getMetadata();

        return $this;
    }

    public function getMetadata(): ?string
    {
        return $this->metadata;
    }

    /**
     * Display name.
     *
     * @param string|null $displayName Display name.
     *
     * @return self
     */
    public function setDisplayName(?string $displayName): self
    {
        $this->displayName = $displayName;

        return $this;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }
}
