<?php

declare(strict_types=1);

namespace Item\Material\Collection;

use Item\ItemException;
use Item\Material\MaterialException;
use Item\Material\MaterialFactory;

class MaterialCollectionFactory
{
    /**
     * @param array $data
     * @return MaterialCollection
     * @throws ItemException
     */
    public static function create(array $data): MaterialCollection
    {
        $collection = new MaterialCollection();

        foreach ($data as $datum) {
            if (!is_array($datum)) {
                throw new ItemException(MaterialException::EXPECTED_ARRAY);
            }

            $collection->add(MaterialFactory::create($datum));
        }

        return $collection;
    }
}
