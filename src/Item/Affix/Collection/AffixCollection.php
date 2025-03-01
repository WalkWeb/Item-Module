<?php

declare(strict_types=1);

namespace Item\Affix\Collection;

use Item\Affix\AffixException;
use Item\Affix\AffixInterface;
use Item\ItemException;
use Item\Traits\CollectionTrait;
use Countable;
use Iterator;

class AffixCollection implements Iterator, Countable
{
    use CollectionTrait;

    /**
     * @var AffixInterface[]
     */
    private array $elements = [];

    /**
     * @param AffixInterface $affix
     * @throws ItemException
     */
    public function add(AffixInterface $affix): void
    {
        if (array_key_exists($affix->getId(), $this->elements)) {
            throw new ItemException(AffixException::ALREADY_EXIST);
        }

        $this->elements[$affix->getId()] = $affix;
    }

    /**
     * @return AffixInterface
     */
    public function current(): AffixInterface
    {
        return current($this->elements);
    }
}
