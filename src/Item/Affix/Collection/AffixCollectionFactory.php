<?php

declare(strict_types=1);

namespace Item\Affix\Collection;

use Item\Affix\AffixException;
use Item\Affix\AffixFactory;
use Item\ItemException;

class AffixCollectionFactory
{
    /**
     * @param array $data
     * @return AffixCollection
     * @throws ItemException
     */
    public static function create(array $data): AffixCollection
    {
        $collection = new AffixCollection();

        foreach ($data as $datum) {
            if (!is_array($datum)) {
                throw new ItemException(AffixException::EXPECTED_ARRAY);
            }

            $collection->add(AffixFactory::create($datum));
        }

        return $collection;
    }
}
