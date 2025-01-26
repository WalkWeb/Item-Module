<?php

declare(strict_types=1);

namespace Item\Drawing\Stat;

use Exception;

class StatException extends Exception
{
    public const INVALID_NAME    = 'Incorrect parameter "name", it required and type string';
    public const INVALID_VALUE   = 'Incorrect parameter "value", it required and type int or float';
    public const INVALID_QUALITY = 'Incorrect parameter "quality", it required and type bool';
    public const INVALID_SUFFIX  = 'Incorrect parameter "suffix", it required and type string';
}
