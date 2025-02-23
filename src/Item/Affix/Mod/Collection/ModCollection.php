<?php

declare(strict_types=1);

namespace Item\Affix\Mod\Collection;

use Item\Affix\Mod\ModException;
use Item\Affix\Mod\ModInterface;
use Item\ItemException;
use Item\Traits\CollectionTrait;
use Countable;
use Iterator;

class ModCollection implements Iterator, Countable
{
    use CollectionTrait;

    /**
     * @var ModInterface[]
     */
    private array $elements = [];

    /**
     * @param ModInterface $mod
     * @throws ItemException
     */
    public function add(ModInterface $mod): void
    {
        if (array_key_exists($mod->getName(), $this->elements)) {
            throw new ItemException(ModException::ALREADY_EXIST);
        }

        $this->elements[$mod->getName()] = $mod;
    }

    /**
     * @return ModInterface
     */
    public function current(): ModInterface
    {
        return current($this->elements);
    }
}
