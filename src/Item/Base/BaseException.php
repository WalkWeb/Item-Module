<?php

declare(strict_types=1);

namespace Item\Base;

use Exception;

class BaseException extends Exception
{
    public const INVALID_WEIGHT        = 'Incorrect parameter "weight", it required and type int';
    public const INVALID_STRENGTH      = 'Incorrect parameter "strength", it required and type int';
    public const INVALID_DEXTERITY     = 'Incorrect parameter "dexterity", it required and type int';
    public const INVALID_INTELLIGENCE  = 'Incorrect parameter "intelligence", it required and type int';
    public const INVALID_WILL          = 'Incorrect parameter "will", it required and type int';
    public const INVALID_ENDURANCE     = 'Incorrect parameter "endurance", it required and type int';
    public const INVALID_PERCIPIENCE   = 'Incorrect parameter "percipience", it required and type int';
    public const INVALID_CHARISMA      = 'Incorrect parameter "charisma", it required and type int';
    public const INVALID_LUCK          = 'Incorrect parameter "luck", it required and type int';
    public const INVALID_LIFE          = 'Incorrect parameter "life", it required and type int';
    public const INVALID_INCREASE_LIFE = 'Incorrect parameter "increase_life", it required and type int';
    public const INVALID_MANA          = 'Incorrect parameter "mana", it required and type int';
    public const INVALID_INCREASE_MANA = 'Incorrect parameter "increase_mana", it required and type int';
    public const INVALID_STAMINA       = 'Incorrect parameter "stamina", it required and type int';
    public const INVALID_MAX_HORROR    = 'Incorrect parameter "max_horror", it required and type int';
    public const INVALID_LIFE_REGEN    = 'Incorrect parameter "life_regen", it required and type int';
    public const INVALID_MANA_REGEN    = 'Incorrect parameter "mana_regen", it required and type int';
    public const INVALID_BONUS_CONC    = 'Incorrect parameter "bonus_concentration", it required and type int';
    public const INVALID_BONUS_CUNNING = 'Incorrect parameter "bonus_cunning", it required and type int';
    public const INVALID_BONUS_RAGE    = 'Incorrect parameter "bonus_rage", it required and type int';
    public const INVALID_INCREASE_GOLD = 'Incorrect parameter "increase_gold", it required and type int';
    public const INVALID_STAMINA_COST  = 'Incorrect parameter "stamina_cost", it required and type int';
    public const INVALID_BELT_SLOT     = 'Incorrect parameter "belt_slot", it required and type int';
}
