<?php

declare(strict_types=1);

namespace Item;

use Exception;

class ItemException extends Exception
{
    public const UNKNOWN_TYPE_ID      = 'Unknown type id';
    public const UNKNOWN_SECTION_TYPE = 'Unknown section type';
    public const UNKNOWN_EQUIP_TYPE   = 'Unknown equip type';
    public const UNKNOWN_WEAPON_TYPE  = 'Unknown weapon type';
    public const UNKNOWN_ARMOR_TYPE   = 'Unknown armor type';
    public const UNKNOWN_POTION_TYPE  = 'Unknown weapon type';
    public const UNKNOWN_GENDER_TYPE  = 'Unknown gender type';
}
