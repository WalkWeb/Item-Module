<?php

declare(strict_types=1);

namespace Item\Drawing\Stat;

use Item\ItemException;

class StatCollectionFactory
{
    /**
     * @param array $data
     * @return StatCollection
     * @throws ItemException
     */
    public static function create(array $data): StatCollection
    {
        $collection = new StatCollection();

        foreach ($data as $datum) {
            if (!is_array($datum)) {
                throw new ItemException(StatException::EXPECTED_ARRAY);
            }

            $collection->add(StatFactory::create($datum));
        }

        return $collection;
    }
}
