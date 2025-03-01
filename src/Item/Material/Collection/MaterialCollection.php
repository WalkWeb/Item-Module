<?php

declare(strict_types=1);

namespace Item\Material\Collection;

use Item\ItemException;
use Item\Material\MaterialException;
use Item\Material\MaterialInterface;
use Item\Traits\CollectionTrait;
use Countable;
use Iterator;

class MaterialCollection implements Iterator, Countable
{
    use CollectionTrait;

    /**
     * @var MaterialInterface[]
     */
    private array $elements = [];

    /**
     * @param MaterialInterface $stat
     * @throws ItemException
     */
    public function add(MaterialInterface $stat): void
    {
        if (array_key_exists($stat->getName(), $this->elements)) {
            throw new ItemException(MaterialException::ALREADY_EXIST);
        }

        $this->elements[$stat->getName()] = $stat;
    }

    /**
     * @return MaterialInterface
     */
    public function current(): MaterialInterface
    {
        return current($this->elements);
    }
}
