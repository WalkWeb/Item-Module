<?php

declare(strict_types=1);

namespace Item\Drawing;

use Exception;

class DrawingException extends Exception
{
    public const INVALID_ID               = 'Incorrect parameter "id", it required and type int';
    public const INVALID_NAME             = 'Incorrect parameter "name", it required and type string';
    public const INVALID_ICON             = 'Incorrect parameter "icon", it required and type string';
    public const INVALID_PRICE            = 'Incorrect parameter "price", it required and type int';
    public const INVALID_MIN_LEVEL        = 'Incorrect parameter "min_level", it required and type int';
    public const INVALID_MIN_STRENGTH     = 'Incorrect parameter "min_strength", it required and type int';
    public const INVALID_MIN_DEXTERITY    = 'Incorrect parameter "min_dexterity", it required and type int';
    public const INVALID_MIN_INTELLIGENCE = 'Incorrect parameter "min_intelligence", it required and type int';
    public const INVALID_TYPE_ID          = 'Incorrect parameter "type_id", it required and type int';
    public const INVALID_EQUIP_TYPE_ID    = 'Incorrect parameter "equip_type_id", it required and type int';
    public const INVALID_SECTION_TYPE_ID  = 'Incorrect parameter "section_type_id", it required and type int';
    public const INVALID_WEAPON_TYPE_ID   = 'Incorrect parameter "weapon_type_id", it required and type int';
    public const INVALID_ARMOR_TYPE_ID    = 'Incorrect parameter "armor_type_id", it required and type int';
    public const INVALID_POTION_TYPE_ID   = 'Incorrect parameter "potion_type_id", it required and type int';
    public const INVALID_MATERIAL_TYPE_ID = 'Incorrect parameter "material_type_id", it required and type int';

    public const MISS_EQUIP_TYPE          = 'Equipment type not specified';
    public const MISS_SECTION_TYPE        = 'Equipment section not specified';
    public const MISS_POTION_TYPE         = 'Potion type not specified';
    public const MISS_MATERIAL_TYPE       = 'Material type not specified';
}
