<?php

declare(strict_types=1);

namespace Item\Affix\Mod;

use Exception;

class ModException extends Exception
{
    public const ALREADY_EXIST     = 'ModCollection: stat to be added already exists';
    public const EXPECTED_ARRAY    = 'ModCollectionFactory: expected array data';
    public const EMPTY_MODS        = 'ModCollectionFactory: mods can\'t be empty';

    public const INVALID_NAME      = 'Incorrect parameter "name", it required and type string and format "value.value"';
    public const INVALID_PREFIX    = 'Incorrect parameter "prefix", it required and type string';
    public const INVALID_SUFFIX    = 'Incorrect parameter "suffix", it required and type string';
    public const INVALID_MIN_VALUE = 'Incorrect parameter "min_value", it required and type int';
    public const INVALID_MAX_VALUE = 'Incorrect parameter "max_value", it required and type int';
}
