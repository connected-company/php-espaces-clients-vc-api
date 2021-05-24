<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Exception;

use Connected\EspaceClientVC\Enum\FlagEnum;

/**
 * Exception.
 */
class StrategyNotFoundException extends \Exception
{
    /**
     * Constructs a new instance.
     *
     * @param      \Connected\EspaceClientVC\Enum\FlagEnum|string  $flag   The flag.
     */
    public function __construct(FlagEnum $flag)
    {
        parent::__construct('Aucune stratégie trouvé pour le flag `' . $flag . '`.');
    }
}
