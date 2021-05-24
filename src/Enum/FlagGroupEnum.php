<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Enum;

use Elao\Enum\ChoiceEnumTrait;
use Elao\Enum\ReadableEnum;

/**
 * FlagGroups.
 */
class FlagGroupEnum extends ReadableEnum
{
    use ChoiceEnumTrait;

    const APPELS_DE_FOND = 'appels_de_fond';

    /**
     * @return array
     */
    public static function choices(): array
    {
        return [
            static::APPELS_DE_FOND => 'appels_de_fond',
        ];
    }

    /**
     * Mapping des groupes/
     *
     * @param      FlagGroupEnum  $flagGroup  The flag group
     *
     * @return     array
     */
    public static function mapping(FlagGroupEnum $flagGroup): array
    {
        $mapping = [
            self::APPELS_DE_FOND => [
                FlagEnum::get(FlagEnum::APPEL_DE_FOND_LIBELLE),
                FlagEnum::get(FlagEnum::APPEL_DE_FOND_DATE),
                FlagEnum::get(FlagEnum::APPEL_DE_FOND_MONTANT),
                FlagEnum::get(FlagEnum::APPEL_DE_FOND_APPELE)
            ]
        ];

        return $mapping[(string)$flagGroup] ?? [];
    }
}
