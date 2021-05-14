<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Enum;

use Elao\Enum\ChoiceEnumTrait;
use Elao\Enum\ReadableEnum;

/**
 * Clés d'identifiants.
 */
class AppIdentifierEnum extends ReadableEnum
{
    use ChoiceEnumTrait;

    const CHRONOS_LOT_ID = 'CHRONOS_LOT_ID';
    const HERACLES_LOT_ID = 'HERACLES_LOT_ID';
    const ARAMIS_LOT_ID = 'ARAMIS_LOT_ID';
    const GAIA_LOT_ID = 'GAIA_LOT_ID';
    const BOTERO_LOT_ID = 'BOTERO_LOT_ID';
    const HERMES_LOT_ID = 'HERMES_LOT_ID';
    const ZEPHYR_VENTE_ID = 'ZEPHYR_VENTE_ID';

    /**
     * @return array
     */
    public static function choices(): array
    {
        return [
            static::CHRONOS_LOT_ID => 'CHRONOS_LOT_ID',
            static::HERACLES_LOT_ID => 'HERACLES_LOT_ID',
            static::ARAMIS_LOT_ID => 'ARAMIS_LOT_ID',
            static::GAIA_LOT_ID => 'GAIA_LOT_ID',
            static::BOTERO_LOT_ID => 'BOTERO_LOT_ID',
            static::HERMES_LOT_ID => 'HERMES_LOT_ID',
            static::ZEPHYR_VENTE_ID => 'ZEPHYR_VENTE_ID'
        ];
    }
}
