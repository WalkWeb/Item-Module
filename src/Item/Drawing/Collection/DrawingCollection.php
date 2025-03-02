<?php

declare(strict_types=1);

namespace Item\Drawing\Collection;

use Countable;
use Item\Drawing\DrawingException;
use Item\Drawing\DrawingInterface;
use Item\ItemException;
use Item\Traits\CollectionTrait;
use Iterator;

class DrawingCollection implements Iterator, Countable
{
    use CollectionTrait;

    /**
     * @var DrawingInterface[]
     */
    private array $elements = [];

    /**
     * @param DrawingInterface $drawing
     * @throws ItemException
     */
    public function add(DrawingInterface $drawing): void
    {
        if (array_key_exists($drawing->getId(), $this->elements)) {
            throw new ItemException(DrawingException::ALREADY_EXIST);
        }

        $this->elements[$drawing->getId()] = $drawing;
    }

    /**
     * @return DrawingInterface
     */
    public function current(): DrawingInterface
    {
        return current($this->elements);
    }
}
