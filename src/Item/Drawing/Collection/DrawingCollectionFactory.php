<?php

declare(strict_types=1);

namespace Item\Drawing\Collection;

use Item\Drawing\DrawingException;
use Item\Drawing\DrawingFactory;
use Item\ItemException;

class DrawingCollectionFactory
{
    /**
     * @param array $data
     * @return DrawingCollection
     * @throws ItemException
     */
    public static function create(array $data): DrawingCollection
    {
        $collection = new DrawingCollection();

        foreach ($data as $datum) {
            if (!is_array($datum)) {
                throw new ItemException(DrawingException::EXPECTED_ARRAY);
            }

            $collection->add(DrawingFactory::create($datum));
        }

        return $collection;
    }
}
