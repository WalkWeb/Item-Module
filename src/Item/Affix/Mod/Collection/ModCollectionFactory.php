<?php

declare(strict_types=1);

namespace Item\Affix\Mod\Collection;

use Item\Affix\Mod\ModException;
use Item\Affix\Mod\ModFactory;
use Item\ItemException;

class ModCollectionFactory
{
    /**
     * @param array $data
     * @return ModCollection
     * @throws ItemException
     */
    public static function create(array $data): ModCollection
    {
        $collection = new ModCollection();

        foreach ($data as $datum) {
            if (!is_array($datum)) {
                throw new ItemException(ModException::EXPECTED_ARRAY);
            }

            $collection->add(ModFactory::create($datum));
        }

        if (count($collection) === 0) {
            throw new ItemException(ModException::EMPTY_MODS);
        }

        return $collection;
    }
}
