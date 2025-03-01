<?php

declare(strict_types=1);

namespace Item\Material;

use Exception;

class MaterialException extends Exception
{
    public const NOT_FOUND       = 'Material not found';
    public const ALREADY_EXIST   = 'MaterialCollection: stat to be added already exists';
    public const EXPECTED_ARRAY  = 'Material: expected array data';
    public const EMPTY_SELECTED  = 'Empty selected materials';
    public const EXPECTED_EQUIP  = 'Invalid drawing: expected equip';

    public const INVALID_NAME    = 'Incorrect parameter "name", it required and type string';
    public const INVALID_ICON    = 'Incorrect parameter "icon", it required and type string';
    public const INVALID_LEVEL   = 'Incorrect parameter "level", it required and type int';
    public const INVALID_QUALITY = 'Incorrect parameter "level", it required and type float';
    public const INVALID_PREFIX  = 'Incorrect parameter "prefix", it required and type string';
    public const INVALID_SUFFIX  = 'Incorrect parameter "suffix", it required and type string';
    public const INVALID_ELEMENT = 'Incorrect parameter "element", it required and type int';
}
