<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Model;

use Connected\EspaceClientVC\Enum\FlagEnum;
use Connected\EspaceClientVC\Enum\FlagGroupEnum;

/**
 * Modèle pour configurer une demande de données.
 */
class Configuration
{
    /**
     * @param mixed $client      Client.
     * @param array       $flagGroups FlagGroups.
     * @param array       $flags      Flags.
     */
    public function __construct(
        private mixed $client = null,
        private array $flagGroups = [],
        private array $flags = []
    ) {
    }

    /**
     * @return mixed
     */
    public function getClient(): mixed
    {
        return $this->client;
    }

    /**
     * @return array
     */
    public function getFlagGroups(): array
    {
        return $this->flagGroups;
    }

    /**
     * @return array
     */
    public function getFlags(): array
    {
        return $this->flags;
    }

    /**
     * Générateur sur les Flags.
     *
     * @return \Generator
     */
    public function nextFlag(): \Generator
    {
        foreach ($this->flags as $flag) {
            try {
                yield FlagEnum::get($flag);
            } catch (\Exception $e) {
                yield null;
            }
        }
    }

    /**
     * Générateur sur les FlagGroups.
     *
     * @return \Generator
     */
    public function nextFlagGroup(): \Generator
    {
        foreach ($this->flagGroups as $flagGroup) {
            try {
                yield FlagGroupEnum::get($flagGroup);
            } catch (\Exception $e) {
                yield null;
            }
        }
    }
}
