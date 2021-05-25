<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Model;

use Connected\EspaceClientVC\Enum\FlagEnum;
use Connected\EspaceClientVC\Contract\FlagMetadataInterface;

/**
 * Données d'un flag.
 */
class FlagData
{
    /**
     * @var mixed
     */
    private mixed $value = null;

    /**
     * @var string|null
     */
    private ?string $date = null;

    /**
     * @var string|null
     */
    private ?string $metadata = null;

    /**
     * @var null
     */
    private ?string $displayName = null;

    /**
     * @param FlagEnum $flag FlagEnum.
     */
    public function __construct(private FlagEnum $flag)
    {
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
            $value = $value->format(\DateTimeInterface::ATOM);
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
        $start = $start->format(\DateTimeInterface::ATOM);
        $end = $end->format(\DateTimeInterface::ATOM);

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
            $this->date = $date->format(\DateTimeInterface::ATOM);
        }

        return $this;
    }

    /**
     * Metadata.
     *
     * @param FlagMetadataInterface $flagMetadata FlagMetadata.
     *
     * @return self
     */
    public function setMetadata(?FlagMetadataInterface $flagMetadata): self
    {
        $this->metadata = $flagMetadata->getMetadata();

        return $this;
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
}
