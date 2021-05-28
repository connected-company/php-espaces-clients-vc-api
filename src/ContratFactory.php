<?php declare(strict_types=1);

namespace Connected\EspaceClientVC;

use Connected\EspaceClientVC\Enum\ContratTypeEnum;
use Connected\EspaceClientVC\Enum\FlagEnum;
use Connected\EspaceClientVC\Enum\FlagGroupEnum;
use Connected\EspaceClientVC\Model\Configuration;
use Connected\EspaceClientVC\Model\Contrat;
use Connected\EspaceClientVC\Model\FlagDataCollection;
use Symfony\Component\HttpFoundation\Request;

/**
 * Factory pour les Contrat.
 */
class ContratFactory
{
    /**
     * @param iterable $strategies Strategies.
     */
    public function __construct(private iterable $strategies)
    {
    }

    /**
     * Traitement d'un Contrat.
     *
     * @param  ContratTypeEnum $type          ContratTypeEnum.
     * @param  Configuration   $configuration Configuration.
     * @param  mixed           $appContrat       Contrat, envoyé aux Closures.
     *
     * @return Contrat
     */
    public function process(ContratTypeEnum $type, Configuration $configuration, mixed $appContrat): Contrat
    {
        $contrat = new Contrat($type);

        foreach ($configuration->nextFlag() as $flag) {
            try {
                foreach ($this->processFlagRequested($flag, $configuration, $appContrat) as $flagData) {
                    if(!empty($flagData->getValue())) {
                        $contrat->addFlagData($flagData);
                    }
                }
            } catch (\Exception $e) {
                // Pas de gestion d'erreurs sur le projet espace clients, alors on ignore les erreurs...
            }
        }

        foreach ($configuration->nextFlagGroup() as $flagGroup) {
            try {
                $flags = FlagGroupEnum::mapping($flagGroup);
                foreach ($flags as $flag) {
                    foreach ($this->processFlagRequested($flag, $configuration, $appContrat) as $flagData) {
                        if(!empty($flagData->getValue())) {
                            $contrat->addFlagData($flagData);
                        }
                    }
                }
            } catch (\Exception $e) {
                // Pas de gestion d'erreurs sur le projet espace clients, alors on ignore les erreurs...
            }
        }

        return $contrat;
    }

    /**
     * Traitement d'un flag.
     *
     * @param  FlagEnum $flag          FlagEnum.
     * @param  mixed    $appContrat Contrat.
     *
     * @throws \LogicException Pas de stratégie.
     *
     * @return FlagDataCollection
     */
    private function processFlagRequested(FlagEnum $flag, Configuration $configuration, mixed $appContrat): FlagDataCollection
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy->getMapping()->supports($flag)) {
                $flagCollection = new FlagDataCollection($flag);
                $flagParameter = FlagEnum::isCollection($flag) ? $flagCollection : $flagCollection->newFlag();
                $strategy->getMapping()->get($flag)($flagParameter, $configuration->getClient(), $appContrat);

                return $flagCollection;
            }
        }

        throw new \LogicException('Aucune stratégie trouvé pour le flag `' . $flag . '`.', 500);
    }
}
