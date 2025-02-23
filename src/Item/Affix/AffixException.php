<?php

declare(strict_types=1);

namespace Item\Affix;

use Exception;

class AffixException extends Exception
{
    public const ALREADY_EXIST          = 'AffixCollection: stat to be added already exists';
    public const EXPECTED_ARRAY         = 'AffixCollectionFactory: expected array data';

    public const INVALID_ID             = 'Incorrect parameter "id", it required and type int';
    public const INVALID_TYPE_ID        = 'Incorrect parameter "type_id", it required and type int';
    public const INVALID_MIN_LEVEL      = 'Incorrect parameter "min_level", it required and type int';
    public const INVALID_REQUIRED_LEVEL = 'Incorrect parameter "required_level", it required and type int';
    public const INVALID_RARITY         = 'Incorrect parameter "rarity", it required and type int';
    public const INVALID_PRICE          = 'Incorrect parameter "price", it required and type int';
    public const INVALID_MODS           = 'Incorrect parameter "mods", it required and type array';
}
