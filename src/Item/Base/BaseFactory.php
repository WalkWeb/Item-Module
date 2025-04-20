<?php

declare(strict_types=1);

namespace Item\Base;

use Item\ItemException;
use Item\Traits\ValidationTrait;

class BaseFactory
{
    use ValidationTrait;

    /**
     * @param array $data
     * @return BaseInterface
     * @throws ItemException
     */
    public static function create(array $data): BaseInterface
    {
        return new Base(
            self::int($data, 'weight', BaseException::INVALID_WEIGHT),
            self::int($data, 'strength', BaseException::INVALID_STRENGTH),
            self::int($data, 'dexterity', BaseException::INVALID_DEXTERITY),
            self::int($data, 'intelligence', BaseException::INVALID_INTELLIGENCE),
            self::int($data, 'will', BaseException::INVALID_WILL),
            self::int($data, 'endurance', BaseException::INVALID_ENDURANCE),
            self::int($data, 'percipience', BaseException::INVALID_PERCIPIENCE),
            self::int($data, 'charisma', BaseException::INVALID_CHARISMA),
            self::int($data, 'luck', BaseException::INVALID_LUCK),
            self::int($data, 'life', BaseException::INVALID_LIFE),
            self::int($data, 'increase_life', BaseException::INVALID_INCREASE_LIFE),
            self::int($data, 'mana', BaseException::INVALID_MANA),
            self::int($data, 'increase_mana', BaseException::INVALID_INCREASE_MANA),
            self::int($data, 'stamina', BaseException::INVALID_STAMINA),
            self::int($data, 'max_horror', BaseException::INVALID_MAX_HORROR),
            self::int($data, 'life_regen', BaseException::INVALID_LIFE_REGEN),
            self::int($data, 'mana_regen', BaseException::INVALID_MANA_REGEN),
            self::int($data, 'bonus_concentration', BaseException::INVALID_BONUS_CONC),
            self::int($data, 'bonus_cunning', BaseException::INVALID_BONUS_CUNNING),
            self::int($data, 'bonus_rage', BaseException::INVALID_BONUS_RAGE),
            self::int($data, 'increase_gold', BaseException::INVALID_INCREASE_GOLD),
            self::int($data, 'stamina_cost', BaseException::INVALID_STAMINA_COST),
            self::int($data, 'belt_slot', BaseException::INVALID_BELT_SLOT),
        );
    }

    /**
     * @param int $weight
     * @return BaseInterface
     */
    public static function new(int $weight): BaseInterface
    {
        return new Base($weight);
    }
}
