<?php

declare(strict_types=1);

namespace Item;

use Exception;

class ItemException extends Exception
{
    public const UNKNOWN_TYPE_ID    = 'Unknown type id';
    public const UNKNOWN_SECTION_ID = 'Unknown section id';
    public const UNKNOWN_EQUIP_ID   = 'Unknown equip id';
    public const UNKNOWN_WEAPON_ID  = 'Unknown weapon id';
}
