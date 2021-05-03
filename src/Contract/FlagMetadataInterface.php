<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Contract;

/**
 * Interface de gestion de la metadata.
 */
interface FlagMetadataInterface
{
    /**
     * @return string
     */
    public function getMetadata(): string;
}
