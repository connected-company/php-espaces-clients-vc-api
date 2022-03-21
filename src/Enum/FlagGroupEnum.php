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
    const DOCUMENTS_APPEL_FOND = 'documents_appel_fond';
    const DOCUMENTS_AUTRE = 'documents_autre';

    /**
     * @return array
     */
    public static function choices(): array
    {
        return [
            static::APPELS_DE_FOND => 'appels_de_fond',
            static::DOCUMENTS_APPEL_FOND => 'documents_appel_fond',
            static::DOCUMENTS_AUTRE => 'documents_autre'
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
            ],
            self::DOCUMENTS_APPEL_FOND => [
                FlagEnum::get(FlagEnum::DOCUMENT_APPEL_FOND),
                FlagEnum::get(FlagEnum::DOCUMENT_APPEL_FOND_PHOTO)
            ],
            self::DOCUMENTS_AUTRE => [
                FlagEnum::get(FlagEnum::DOCUMENT_LOT_AUTRE)
            ]
        ];

        return $mapping[(string)$flagGroup] ?? [];
    }
}
