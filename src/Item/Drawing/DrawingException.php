<?php

declare(strict_types=1);

namespace Item\Drawing;

use Exception;

class DrawingException extends Exception
{
    public const NOT_FOUND                = 'Drawing not found';
    public const EXPECTED_ARRAY           = 'Drawing: expected array data';
    public const ALREADY_EXIST            = 'DrawingCollection: stat to be added already exists';

    public const INVALID_ID               = 'Incorrect parameter "id", it required and type int';
    public const INVALID_NAME             = 'Incorrect parameter "name", it required and type string';
    public const INVALID_ICON             = 'Incorrect parameter "icon", it required and type string';
    public const INVALID_PRICE            = 'Incorrect parameter "price", it expected int or miss';
    public const INVALID_WEIGHT           = 'Incorrect parameter "weight", it required and type int';
    public const INVALID_MIN_LEVEL        = 'Incorrect parameter "min_level", it required and type int';
    public const INVALID_STRENGTH         = 'Incorrect parameter "strength", it required and type float';
    public const INVALID_DEXTERITY        = 'Incorrect parameter "dexterity", it required and type float';
    public const INVALID_INTELLIGENCE     = 'Incorrect parameter "intelligence", it required and type float';
    public const INVALID_AFFIX_EXCEPTION  = 'Incorrect parameter "affix_exception", it required and type array';
    public const INVALID_AFFIX_DATA       = 'Incorrect parameter "affix_exception", expected array int';
    public const INVALID_TYPE_ID          = 'Incorrect parameter "type_id", it required and type int';
    public const INVALID_EQUIP_TYPE_ID    = 'Incorrect parameter "equip_type_id", it required and type int';
    public const INVALID_SECTION_TYPE_ID  = 'Incorrect parameter "section_type_id", it required and type int';
    public const INVALID_WEAPON_TYPE_ID   = 'Incorrect parameter "weapon_type_id", it expected type int or null or miss';
    public const INVALID_ARMOR_TYPE_ID    = 'Incorrect parameter "armor_type_id", it expected type int or null or miss';
    public const INVALID_POTION_TYPE_ID   = 'Incorrect parameter "potion_type_id", it expected type int or null or miss';
    public const INVALID_MATERIAL_TYPE_ID = 'Incorrect parameter "material_type_id", it required and type int';
    public const INVALID_GENDER_TYPE_ID   = 'Incorrect parameter "gender_type_id", it required and type int';
    public const INVALID_MAGIC_TYPE_ID    = 'Incorrect parameter "magic_type_id", it required and type int';
    public const INVALID_STATS            = 'Incorrect parameter "stats", it required and type array';

    public const MISS_EQUIP_TYPE          = 'Equipment type not specified';
    public const MISS_SECTION_TYPE        = 'Equipment section not specified';
    public const MISS_POTION_TYPE         = 'Potion type not specified';
    public const MISS_MATERIAL_TYPE       = 'Material type not specified';
    public const MISS_GENDER_TYPE         = 'Gender type not specified';
    public const MISS_MAGIC_TYPE          = 'Magic type not specified';

    public const EMPTY_SELECTED           = 'Empty selected drawings';
}
