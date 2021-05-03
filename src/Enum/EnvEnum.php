<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Enum;

use Elao\Enum\ChoiceEnumTrait;
use Elao\Enum\ReadableEnum;

/**
 * Environnements.
 */
class EnvEnum extends ReadableEnum
{
    use ChoiceEnumTrait;

    const QUALIF = 'qualif';
    const PROD = 'prod';

    /**
     * @return array
     */
    public static function choices(): array
    {
        return [
            static::QUALIF => 'qualif',
            static::PROD => 'prod'
        ];
    }
}
