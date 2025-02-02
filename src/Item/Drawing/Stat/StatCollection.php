<?php

declare(strict_types=1);

namespace Item\Drawing\Stat;

use Item\ItemException;
use Item\Traits\CollectionTrait;
use Countable;
use Iterator;

class StatCollection implements Iterator, Countable
{
    use CollectionTrait;

    /**
     * @var StatInterface[]
     */
    private array $elements = [];

    /**
     * @param StatInterface $stat
     * @throws ItemException
     */
    public function add(StatInterface $stat): void
    {
        if (array_key_exists($stat->getName(), $this->elements)) {
            throw new ItemException(StatException::ALREADY_EXIST);
        }

        $this->elements[$stat->getName()] = $stat;
    }

    /**
     * @return StatInterface
     */
    public function current(): StatInterface
    {
        return current($this->elements);
    }
}
