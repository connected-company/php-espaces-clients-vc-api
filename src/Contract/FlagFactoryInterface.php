<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Contract;

use Connected\EspaceClientVC\Model\FlagLogicMapping;

/**
 * Modèle de données pour les contrats des EC V&C.
 */
interface FlagFactoryInterface
{
    /**
     * Mapping des flags.
     *
     * @return FlagLogicMapping
     */
    public function getMapping(): FlagLogicMapping;
}
