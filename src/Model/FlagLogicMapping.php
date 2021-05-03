<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Model;

use Connected\EspaceClientVC\Enum\FlagEnum;

/**
 * Mapping de Closure pour les flags.
 */
class FlagLogicMapping
{
    /**
     * @var array
     */
    private array $mapping = [];

    /**
     * @param  FlagEnum $flag FlagEnum.
     *
     * @return boolean
     */
    public function supports(FlagEnum $flag): bool
    {
        return isset($this->mapping[$flag->getValue()]);
    }

    /**
     * @param FlagEnum $flag    FlagEnum.
     * @param \Closure $closure Closure.
     *
     * @return self
     */
    public function add(FlagEnum $flag, \Closure $closure): self
    {
        $this->mapping[$flag->getValue()] = $closure;

        return $this;
    }

    /**
     * @param FlagEnum $flag FlagEnum.
     *
     * @return \Closure
     */
    public function get(FlagEnum $flag): \Closure
    {
        return $this->mapping[$flag->getValue()];
    }
}
