<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Enum;

use Elao\Enum\ChoiceEnumTrait;
use Elao\Enum\ReadableEnum;

/**
 * Type de contrat.
 */
class ContratTypeEnum extends ReadableEnum
{
    use ChoiceEnumTrait;

    const IMMOBILIER = 'immobilier';
    const ASSURANCE = 'assurance';

    /**
     * @return array
     */
    public static function choices(): array
    {
        return [
            static::IMMOBILIER => 'Immobilier',
            static::ASSURANCE => 'Assurance'
        ];
    }
}
