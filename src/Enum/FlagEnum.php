<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Enum;

use Elao\Enum\ChoiceEnumTrait;
use Elao\Enum\ReadableEnum;

/**
 * Flags.
 */
class FlagEnum extends ReadableEnum
{
    use ChoiceEnumTrait;

    // Lot
    const LOT_NUMERO = 'lot_numero';  // OK
    const LOT_TYPE = 'lot_type';  // OK
    const LOT_SUPERFICIE = 'lot_superficie';  // OK
    // Programme
    const PROGRAMME_LIBELLE = 'programme_libelle'; // OK
    const PROGRAMME_ADRESSE = 'programme_adresse'; // OK
    const PROGRAMME_COMMUNE = 'programme_commune'; // OK
    const PROGRAMME_CODE_POSTAL = 'programme_code_postal'; // OK
    const DATE_ACHEVEMENT_DES_TRAVAUX = 'date_achevement_des_travaux'; // OK
    const DATE_ACTABILITE = 'date_actabilite'; // OK
    // Vente
    const CONTRAT_FISCALITE = 'contrat_fiscalite'; // OK
    const MONTANT_ACQUISITION = 'montant_acquisition'; // OK / ATTENTE DE RETOURS HT OU TTC ?
    const DATE_RESERVATION = 'date_reservation'; // OK
    const VENDU_PAR = 'vendu_par'; // OK
    const ACHAT_CASH = 'achat_cash'; // OK
    const DATE_ACTE = 'date_acte'; // OK
    const DATE_OFFRE_DE_PRET = 'date_offre_de_pret'; // NC
    const DATE_ACCEPTATION_OFFRE_DE_PRET = 'date_acceptation_offre_de_pret'; // NC
    const DATE_PRE_LIVRAISON = 'date_pre_livraison'; // NC

    const DATE_NOTIFICATION_LIVRAISON = 'date_notification_livraison'; // A VOIR
    const DATE_LIVRAISON = 'date_livraison'; // A DEFINIR
    const DATE_LIVRAISON_PREVISIONNELLE = 'date_livraison_previsionnelle'; // A DEFINIR

    // Appels de fonds
    const APPEL_DE_FOND_LIBELLE = 'appel_de_fond_libelle'; // OK
    const APPEL_DE_FOND_DATE = 'appel_de_fond_date'; // OK
    const APPEL_DE_FOND_MONTANT = 'appel_de_fond_montant';
    const APPEL_DE_FOND_APPELE = 'appel_de_fond_appele';
    const APPEL_DE_FOND_SOLDE_RESTANT_A_APPELER = 'appel_de_fond_solde_restant_a_appeler';
    const APPEL_DE_FOND_STATUT = 'appel_de_fond_statut';
    // Financement
    const DUREE_PRET = 'duree_pret'; // NC
    const MONTANT_PRET = 'montant_pret'; // NC
    const NOM_BANQUE = 'nom_banque'; // NC
    const ADRESSE_BANQUE = 'adresse_banque'; // NC
    const COMMUNE_BANQUE = 'commune_banque'; // NC
    const CODE_POSTAL_BANQUE = 'code_postal_banque'; // NC
    const LIEN_SIGNATURE_ENTREE_RELATION = 'lien_signature_entree_relation';
    const LIEN_SIGNATURE_MANDAT_RECHERCHE = 'lien_signature_mandat_recherche';
    const LIEN_SIGNATURE_DEMANDE_FINANCEMENT = 'lien_signature_demande_financement';
    const LIEN_SIGNATURE_AVIS_CONSEIL = 'lien_signature_avis_conseil';
    const PROCESS_SIGNATURE_RECHERCHE_FINANCEMENT_ACTIF = 'process_signature_recherche_financement_actif';
    const PROCESS_SIGNATURE_RECHERCHE_FINANCEMENT_ETAPE = 'process_signature_recherche_financement_etape';
    // Document
    const DOCUMENT_CONTRAT_RESERVATION = 'document_contrat_reservation'; // OK
    const DOCUMENT_ANNEXES = 'document_annexes'; // OK
    const DOCUMENT_PLANS = 'document_plans'; // OK
    const DOCUMENT_ATTESTATION_NOTAIRE_ACTE = 'document_attestation_notaire_acte'; // OK
    const DOCUMENT_APPEL_FOND = 'document_appel_fond'; // OK
    const DOCUMENT_BAIL_COMMERCIAL = 'document_bail_commercial'; // OK
    const DOCUMENT_MANDAT_GESTION = 'document_mandat_gestion'; // OK
    const DOCUMENT_FICHE_MISE_EN_RELATION = 'document_fiche_mise_en_relation';
    const DOCUMENT_MANDAT_RECHERCHE_CREDIT_MONTANT = 'document_mandat_recherche_credit_montant';
    const DOCUMENT_AVIS_CONSEIL_DONNE = 'document_avis_conseil_donne';
    const DOCUMENT_OFFRE_PRET = 'document_offre_pret';
    const DOCUMENT_FINANCEMENT_AUTRE = 'document_financement_autre'; // OK
    const DOCUMENT_FACTURE_CREDIT = 'document_facture_credit'; // OK
    // Interlocuteur
    const INTERLOCUTEUR_PRINCIPAL_LDAP = 'interlocuteur_principal_ldap';
    const INTERLOCUTEUR_LDAP = 'interlocuteur_ldap';

    /**
     * @return array
     */
    public static function choices(): array
    {
        return [
            // Lot
            static::LOT_NUMERO => 'lot_numero',
            static::LOT_TYPE => 'lot_type',
            static::LOT_SUPERFICIE => 'lot_superficie',
            // Programme
            static::PROGRAMME_LIBELLE => 'programme_libelle',
            static::PROGRAMME_ADRESSE => 'programme_adresse',
            static::PROGRAMME_COMMUNE => 'programme_commune',
            static::PROGRAMME_CODE_POSTAL => 'programme_code_postal',
            static::DATE_ACHEVEMENT_DES_TRAVAUX => 'date_achevement_des_travaux',
            static::DATE_ACTABILITE => 'date_actabilite',
            // Vente
            static::CONTRAT_FISCALITE => 'contrat_fiscalite',
            static::MONTANT_ACQUISITION => 'montant_acquisition',
            static::DATE_RESERVATION => 'date_reservation',
            static::DATE_ACTE => 'date_acte',
            static::DATE_PRE_LIVRAISON => 'date_pre_livraison',
            static::DATE_LIVRAISON => 'date_livraison',
            static::DATE_NOTIFICATION_LIVRAISON => 'date_notification_livraison',
            static::DATE_LIVRAISON_PREVISIONNELLE => 'date_livraison_previsionnelle',
            static::DATE_OFFRE_DE_PRET => 'date_offre_de_pret',
            static::DATE_ACCEPTATION_OFFRE_DE_PRET => 'date_acceptation_offre_de_pret',
            static::VENDU_PAR => 'vendu_par',
            static::ACHAT_CASH => 'achat_cash',
            // Appels de fonds
            static::APPEL_DE_FOND_LIBELLE => 'appel_de_fond_libelle',
            static::APPEL_DE_FOND_DATE => 'appel_de_fond_date',
            static::APPEL_DE_FOND_MONTANT => 'appel_de_fond_montant',
            static::APPEL_DE_FOND_APPELE => 'appel_de_fond_appele',
            static::APPEL_DE_FOND_SOLDE_RESTANT_A_APPELER => 'appel_de_fond_solde_restant_a_appeler',
            static::APPEL_DE_FOND_STATUT => 'appel_de_fond_statut',
            // Financement
            static::DUREE_PRET => 'duree_pret',
            static::MONTANT_PRET => 'montant_pret',
            static::NOM_BANQUE => 'nom_banque',
            static::ADRESSE_BANQUE => 'adresse_banque',
            static::COMMUNE_BANQUE => 'commune_banque',
            static::CODE_POSTAL_BANQUE => 'code_postal_banque',
            static::LIEN_SIGNATURE_ENTREE_RELATION => 'lien_signature_entree_relation',
            static::LIEN_SIGNATURE_MANDAT_RECHERCHE => 'lien_signature_mandat_recherche',
            static::LIEN_SIGNATURE_DEMANDE_FINANCEMENT => 'lien_signature_demande_financement',
            static::LIEN_SIGNATURE_avis_conseil => 'lien_signature_avis_conseil',
            static::PROCESS_SIGNATURE_RECHERCHE_FINANCEMENT_ACTIF => 'process_signature_recherche_financement_actif',
            static::PROCESS_SIGNATURE_RECHERCHE_FINANCEMENT_ETAPE => 'process_signature_recherche_financement_etape',
            // Document
            static::DOCUMENT_CONTRAT_RESERVATION => 'document_contrat_reservation',
            static::DOCUMENT_ANNEXES => 'document_annexes',
            static::DOCUMENT_PLANS => 'document_plans',
            static::DOCUMENT_ATTESTATION_NOTAIRE_ACTE => 'document_attestation_notaire_acte',
            static::DOCUMENT_APPEL_FOND => 'document_appel_fond',
            static::DOCUMENT_BAIL_COMMERCIAL => 'document_bail_commercial',
            static::DOCUMENT_MANDAT_GESTION => 'document_mandat_gestion',
            static::DOCUMENT_FICHE_MISE_EN_RELATION => 'document_fiche_mise_en_relation',
            static::DOCUMENT_MANDAT_RECHERCHE_CREDIT_MONTANT => 'document_mandat_recherche_credit_montant',
            static::DOCUMENT_AVIS_CONSEIL_DONNE => 'document_avis_conseil_donne',
            static::DOCUMENT_OFFRE_PRET => 'document_offre_pret',
            static::DOCUMENT_FINANCEMENT_AUTRE => 'document_financement_autre',
            static::DOCUMENT_FACTURE_CREDIT => 'document_facture_credit',
            // Interlocuteur
            static::INTERLOCUTEUR_PRINCIPAL_LDAP => 'interlocuteur_principal_ldap',
            static::INTERLOCUTEUR_LDAP => 'interlocuteur_ldap'
        ];
    }

    /**
     * Flag demandant une collection.
     *
     * @param  FlagEnum $flag FlagEnum.
     *
     * @return boolean
     */
    public static function isCollection(FlagEnum $flag): bool
    {
        $flagAsCollection = [
            FlagEnum::APPEL_DE_FOND_LIBELLE,
            FlagEnum::APPEL_DE_FOND_DATE,
            FlagEnum::APPEL_DE_FOND_MONTANT,
            FlagEnum::APPEL_DE_FOND_APPELE,
            FlagEnum::DOCUMENT_ANNEXES,
            FlagEnum::DOCUMENT_PLANS,
            FlagEnum::DOCUMENT_APPEL_FOND,
            FlagEnum::DOCUMENT_FICHE_MISE_EN_RELATION,
            FlagEnum::DOCUMENT_MANDAT_RECHERCHE_CREDIT_MONTANT,
            FlagEnum::DOCUMENT_AVIS_CONSEIL_DONNE,
            FlagEnum::DOCUMENT_OFFRE_PRET,
            FlagEnum::DOCUMENT_FINANCEMENT_AUTRE,
            FlagEnum::DOCUMENT_FACTURE_CREDIT,
            FlagEnum::INTERLOCUTEUR_LDAP,
            FlagEnum::INTERLOCUTEUR_PRINCIPAL_LDAP
        ];

        return in_array($flag, $flagAsCollection);
    }
}
