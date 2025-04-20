<?php

declare(strict_types=1);

namespace Item\Offense;

use Exception;

class OffenseException extends Exception
{
    public const MISS_WEAPON_TYPE                 = 'Miss weapon type';
    public const MISS_DAMAGE_TYPE                 = 'Miss damage type';

    public const INVALID_WEAPON_TYPE_ID           = 'Incorrect parameter "weapon_type_id", it required and type int';
    public const INVALID_DAMAGE_TYPE_ID           = 'Incorrect parameter "damage_type_id", it required and type int';
    public const INVALID_PHYSICAL_DAMAGE          = 'Incorrect parameter "physical_damage", it required and type int';
    public const INVALID_FIRE_DAMAGE              = 'Incorrect parameter "fire_damage", it required and type int';
    public const INVALID_WATER_DAMAGE             = 'Incorrect parameter "water_damage", it required and type int';
    public const INVALID_AIR_DAMAGE               = 'Incorrect parameter "air_damage", it required and type int';
    public const INVALID_EARTH_DAMAGE             = 'Incorrect parameter "earth_damage", it required and type int';
    public const INVALID_LIFE_DAMAGE              = 'Incorrect parameter "life_damage", it required and type int';
    public const INVALID_DEATH_DAMAGE             = 'Incorrect parameter "death_damage", it required and type int';
    public const INVALID_INCREASE_PHYSICAL_DAMAGE = 'Incorrect parameter "increase_physical_damage", it required and type int';
    public const INVALID_INCREASE_FIRE_DAMAGE     = 'Incorrect parameter "increase_fire_damage", it required and type int';
    public const INVALID_INCREASE_WATER_DAMAGE    = 'Incorrect parameter "increase_water_damage", it required and type int';
    public const INVALID_INCREASE_AIR_DAMAGE      = 'Incorrect parameter "increase_air_damage", it required and type int';
    public const INVALID_INCREASE_EARTH_DAMAGE    = 'Incorrect parameter "increase_earth_damage", it required and type int';
    public const INVALID_INCREASE_LIFE_DAMAGE     = 'Incorrect parameter "increase_life_damage", it required and type int';
    public const INVALID_INCREASE_DEATH_DAMAGE    = 'Incorrect parameter "increase_death_damage", it required and type int';
    public const INVALID_ATTACK_SPEED             = 'Incorrect parameter "attack_speed", it required and type int';
    public const INVALID_CAST_SPEED               = 'Incorrect parameter "cast_speed", it required and type int';
    public const INVALID_INCREASE_ATTACK_SPEED    = 'Incorrect parameter "increase_attack_speed", it required and type int';
    public const INVALID_INCREASE_CAST_SPEED      = 'Incorrect parameter "increase_cast_speed", it required and type int';
    public const INVALID_ACCURACY                 = 'Incorrect parameter "accuracy", it required and type int';
    public const INVALID_MAGIC_ACCURACY           = 'Incorrect parameter "magic_accuracy", it required and type int';
    public const INVALID_INCREASE_ACCURACY        = 'Incorrect parameter "increase_accuracy", it required and type int';
    public const INVALID_INCREASE_MAGIC_ACCURACY  = 'Incorrect parameter "increase_magic_accuracy", it required and type int';
    public const INVALID_BLOCK_IGNORING           = 'Incorrect parameter "block_ignoring", it required and type int';
    public const INVALID_CRITICAL_CHANCE          = 'Incorrect parameter "critical_chance", it required and type int';
    public const INVALID_CRITICAL_MULTIPLIER      = 'Incorrect parameter "critical_multiplier", it required and type int';
    public const INVALID_INCREASE_CRITICAL_CHANCE = 'Incorrect parameter "increase_critical_chance", it required and type int';
    public const INVALID_DAMAGE_MULTIPLIER        = 'Incorrect parameter "damage_multiplier", it required and type int';
    public const INVALID_VAMPIRISM                = 'Incorrect parameter "vampirism", it required and type int';
    public const INVALID_MAGIC_VAMPIRISM          = 'Incorrect parameter "magic_vampirism", it required and type int';
    public const INVALID_CRITICAL_STUN            = 'Incorrect parameter "critical_stun", it required and type int';
    public const INVALID_CRITICAL_BLEEDING        = 'Incorrect parameter "critical_bleeding", it required and type int';
}
