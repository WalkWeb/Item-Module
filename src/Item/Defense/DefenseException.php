<?php

declare(strict_types=1);

namespace Item\Defense;

use Exception;

class DefenseException extends Exception
{
    public const INVALID_PHYSICAL_RESIST        = 'Incorrect parameter "physical_resist", it required and type int';
    public const INVALID_FIRE_RESIST            = 'Incorrect parameter "fire_resist", it required and type int';
    public const INVALID_WATER_RESIST           = 'Incorrect parameter "water_resist", it required and type int';
    public const INVALID_AIR_RESIST             = 'Incorrect parameter "air_resist", it required and type int';
    public const INVALID_EARTH_RESIST           = 'Incorrect parameter "earth_resist", it required and type int';
    public const INVALID_LIFE_RESIST            = 'Incorrect parameter "life_resist", it required and type int';
    public const INVALID_DEATH_RESIST           = 'Incorrect parameter "death_resist", it required and type int';
    public const INVALID_DEFENSE                = 'Incorrect parameter "defense", it required and type int';
    public const INVALID_MAGIC_DEFENSE          = 'Incorrect parameter "magic_defense", it required and type int';
    public const INVALID_INCREASE_DEFENSE       = 'Incorrect parameter "increase_defense", it required and type int';
    public const INVALID_INCREASE_MAGIC_DEFENSE = 'Incorrect parameter "increase_magic_defense", it required and type int';
    public const INVALID_BLOCK                  = 'Incorrect parameter "block", it required and type int';
    public const INVALID_MAGIC_BLOCK            = 'Incorrect parameter "magic_block", it required and type int';
    public const INVALID_MENTAL_BARRIER         = 'Incorrect parameter "mental_barrier", it required and type int';
    public const INVALID_PHYSICAL_MAX_RESIST    = 'Incorrect parameter "physical_max_resist", it required and type int';
    public const INVALID_FIRE_MAX_RESIST        = 'Incorrect parameter "fire_max_resist", it required and type int';
    public const INVALID_WATER_MAX_RESIST       = 'Incorrect parameter "water_max_resist", it required and type int';
    public const INVALID_AIR_MAX_RESIST         = 'Incorrect parameter "air_max_resist", it required and type int';
    public const INVALID_EARTH_MAX_RESIST       = 'Incorrect parameter "earth_max_resist", it required and type int';
    public const INVALID_LIFE_MAX_RESIST        = 'Incorrect parameter "life_max_resist", it required and type int';
    public const INVALID_DEATH_MAX_RESIST       = 'Incorrect parameter "death_max_resist", it required and type int';
    public const INVALID_GLOBAL_RESIST          = 'Incorrect parameter "global_resist", it required and type int';
    public const INVALID_DODGE                  = 'Incorrect parameter "dodge", it required and type int';
    public const INVALID_HIDDEN_BONUS           = 'Incorrect parameter "bonus_hidden", it required and type int';
}
