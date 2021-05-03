<?php declare(strict_types=1);

namespace Connected\EspaceClientVC\Model;

use Connected\EspaceClientVC\Enum\FlagEnum;

/**
 * Collection de DataFlag.
 */
class FlagDataCollection implements \IteratorAggregate
{
    /**
     * @var array
     */
    private array $flagDatas = [];

    /**
     * @param FlagEnum $flag FlagEnum.
     */
    public function __construct(private FlagEnum $flag)
    {
    }

    /**
     * @return FlagData
     */
    public function newFlag(): FlagData
    {
        $flagData = new FlagData($this->flag);
        $this->flagDatas[] = $flagData;

        return $flagData;
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->flagDatas);
    }
}
