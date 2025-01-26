<?php

declare(strict_types=1);

namespace Item\Drawing\Stat;

use Item\ItemException;
use Item\Traits\ValidationTrait;

class StatFactory
{
    use ValidationTrait;

    /**
     * @param array $data
     * @return StatInterface
     * @throws ItemException
     */
    public static function create(array $data): StatInterface
    {
        return new Stat(
            self::string($data, 'name', StatException::INVALID_NAME),
            self::intOrFloat($data, 'value', StatException::INVALID_VALUE),
            self::bool($data, 'quality', StatException::INVALID_QUALITY),
            self::string($data, 'suffix', StatException::INVALID_SUFFIX),
        );
    }
}
