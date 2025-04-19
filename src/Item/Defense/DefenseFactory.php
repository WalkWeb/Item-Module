<?php

declare(strict_types=1);

namespace Item\Defense;

use Item\ItemException;
use Item\Traits\ValidationTrait;

class DefenseFactory
{
    use ValidationTrait;

    /**
     * @param array $data
     * @return DefenseInterface
     * @throws ItemException
     */
    public static function create(array $data): DefenseInterface
    {
        return new Defense(
            self::int($data, 'physical_resist', DefenseException::INVALID_PHYSICAL_RESIST),
            self::int($data, 'fire_resist', DefenseException::INVALID_FIRE_RESIST),
            self::int($data, 'water_resist', DefenseException::INVALID_WATER_RESIST),
            self::int($data, 'air_resist', DefenseException::INVALID_AIR_RESIST),
            self::int($data, 'earth_resist', DefenseException::INVALID_EARTH_RESIST),
            self::int($data, 'life_resist', DefenseException::INVALID_LIFE_RESIST),
            self::int($data, 'death_resist', DefenseException::INVALID_DEATH_RESIST),
            self::int($data, 'defense', DefenseException::INVALID_DEFENSE),
            self::int($data, 'magic_defense', DefenseException::INVALID_MAGIC_DEFENSE),
            self::int($data, 'increase_defense', DefenseException::INVALID_INCREASE_DEFENSE),
            self::int($data, 'increase_magic_defense', DefenseException::INVALID_INCREASE_MAGIC_DEFENSE),
            self::int($data, 'block', DefenseException::INVALID_BLOCK),
            self::int($data, 'magic_block', DefenseException::INVALID_MAGIC_BLOCK),
            self::int($data, 'mental_barrier', DefenseException::INVALID_MENTAL_BARRIER),
            self::int($data, 'physical_max_resist', DefenseException::INVALID_PHYSICAL_MAX_RESIST),
            self::int($data, 'fire_max_resist', DefenseException::INVALID_FIRE_MAX_RESIST),
            self::int($data, 'water_max_resist', DefenseException::INVALID_WATER_MAX_RESIST),
            self::int($data, 'air_max_resist', DefenseException::INVALID_AIR_MAX_RESIST),
            self::int($data, 'earth_max_resist', DefenseException::INVALID_EARTH_MAX_RESIST),
            self::int($data, 'life_max_resist', DefenseException::INVALID_LIFE_MAX_RESIST),
            self::int($data, 'death_max_resist', DefenseException::INVALID_DEATH_MAX_RESIST),
            self::int($data, 'global_resist', DefenseException::INVALID_GLOBAL_RESIST),
            self::int($data, 'dodge', DefenseException::INVALID_DODGE),
            self::int($data, 'bonus_hidden', DefenseException::INVALID_HIDDEN_BONUS),
        );
    }

    /**
     * @return DefenseInterface
     */
    public static function new(): DefenseInterface
    {
        return new Defense();
    }
}
