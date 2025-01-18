<?php

declare(strict_types=1);

namespace Item\Drawing;

use Exception;

class DrawingException extends Exception
{
    public const INVALID_ID        = 'Incorrect parameter "id", it required and type int';
    public const INVALID_NAME      = 'Incorrect parameter "name", it required and type string';
    public const INVALID_ICON      = 'Incorrect parameter "icon", it required and type string';
    public const INVALID_PRICE     = 'Incorrect parameter "price", it required and type int';
    public const INVALID_MIN_LEVEL = 'Incorrect parameter "min_level", it required and type int';
    public const INVALID_TYPE_ID   = 'Incorrect parameter "type_id", it required and type int';
}
