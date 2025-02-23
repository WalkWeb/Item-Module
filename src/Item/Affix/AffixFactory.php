<?php

declare(strict_types=1);

namespace Item\Affix;

use Item\Affix\Mod\Collection\ModCollectionFactory;
use Item\Affix\Type\AffixType;
use Item\ItemException;
use Item\Traits\ValidationTrait;

class AffixFactory
{
    use ValidationTrait;

    /**
     * @param array $data
     * @return AffixInterface
     * @throws ItemException
     */
    public static function create(array $data): AffixInterface
    {
        return new Affix(
            self::int($data, 'id', AffixException::INVALID_ID),
            new AffixType(self::int($data, 'type_id', AffixException::INVALID_TYPE_ID)),
            self::int($data, 'min_level', AffixException::INVALID_MIN_LEVEL),
            self::int($data, 'required_level', AffixException::INVALID_REQUIRED_LEVEL),
            self::int($data, 'rarity', AffixException::INVALID_RARITY),
            self::int($data, 'price', AffixException::INVALID_PRICE),
            ModCollectionFactory::create(self::array($data, 'mods', AffixException::INVALID_MODS)),
        );
    }
}
