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
    const FINANCEMENT = 'financement';
    const INTERLOCUTEURS = 'interlocuteurs';
    const DOCUMENTS_AUTRE = 'documents_autre';

    /**
     * @return array
     */
    public static function choices(): array
    {
        return [
            static::APPELS_DE_FOND => 'appels_de_fond',
            static::FINANCEMENT => 'financement',
            static::INTERLOCUTEURS => 'interlocuteurs',
            static::DOCUMENTS_AUTRE => 'documents_autre'
        ];
    }

    public static function mapping(FlagGroupEnum $flagGroup): array
    {
        $mapping = [
            self::APPELS_DE_FOND => [
                FlagEnum::get(FlagEnum::APPEL_DE_FOND_LIBELLE),
                FlagEnum::get(FlagEnum::APPEL_DE_FOND_DATE),
                FlagEnum::get(FlagEnum::APPEL_DE_FOND_MONTANT),
                FlagEnum::get(FlagEnum::APPEL_DE_FOND_STATUT),
            ],
            self::FINANCEMENT => [
                FlagEnum::get(FlagEnum::DUREE_PRET),
                FlagEnum::get(FlagEnum::MONTANT_PRET),
                FlagEnum::get(FlagEnum::NOM_BANQUE),
                FlagEnum::get(FlagEnum::ADRESSE_BANQUE),
                FlagEnum::get(FlagEnum::COMMUNE_BANQUE),
                FlagEnum::get(FlagEnum::CODE_POSTAL_BANQUE),
                FlagEnum::get(FlagEnum::LIEN_SIGNATURE_ENTREE_RELATION),
                FlagEnum::get(FlagEnum::LIEN_SIGNATURE_MANDAT_RECHERCHE),
                FlagEnum::get(FlagEnum::LIEN_SIGNATURE_DEMANDE_FINANCEMENT),
                FlagEnum::get(FlagEnum::LIEN_SIGNATURE_AVIS_CONSEIL),
                FlagEnum::get(FlagEnum::PROCESS_SIGNATURE_RECHERCHE_FINANCEMENT_ACTIF),
                FlagEnum::get(FlagEnum::PROCESS_SIGNATURE_RECHERCHE_FINANCEMENT_ETAPE),
            ],
            self::INTERLOCUTEURS => [
                FlagEnum::get(FlagEnum::INTERLOCUTEUR_LDAP),
            ],
            self::DOCUMENTS_AUTRE => [
                FlagEnum::get(FlagEnum::DOCUMENT_FINANCEMENT_AUTRE),
            ]
        ];

        return $mapping[(string)$flagGroup] ?? [];
    }
}
