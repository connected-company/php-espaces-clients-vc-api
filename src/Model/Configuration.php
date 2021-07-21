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
     * @return array
     */
    public function getExistingFlags(): array
    {
        $flags = [];

        foreach ($this->flags as $flag) {
            try {
                $flags[] = FlagEnum::get($flag);
            } catch (\Exception $e) {
            }
        }

        return $flags;
    }

    /**
     * @return array
     */
    public function getExistingFlagGroups(): array
    {
        $flagGroups = [];

        foreach ($this->flagGroups as $flagGroup) {
            try {
                $flagGroups[] = FlagGroupEnum::get($flagGroup);
            } catch (\Exception $e) {
            }
        }

        return $flagGroups;
    }
}
