<?php

declare(strict_types=1);

namespace Item\Collection;

use Countable;
use Item\ItemException;
use Item\ItemInterface;
use Item\Traits\CollectionTrait;
use Iterator;

class ItemCollection implements Iterator, Countable
{
    use CollectionTrait;

    /**
     * @var ItemInterface[]
     */
    private array $elements = [];

    /**
     * @param ItemInterface $item
     * @throws ItemException
     */
    public function add(ItemInterface $item): void
    {
        if (array_key_exists($item->getId(), $this->elements)) {
            throw new ItemException(ItemException::ALREADY_EXIST);
        }

        $this->elements[$item->getId()] = $item;
    }

    /**
     * @return ItemInterface
     */
    public function current(): ItemInterface
    {
        return current($this->elements);
    }
}
