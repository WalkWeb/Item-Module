<?php

declare(strict_types=1);

namespace Item\Affix\Mod;

use Item\ItemException;
use Item\Traits\ValidationTrait;

class ModFactory
{
    use ValidationTrait;

    /**
     * @param array $data
     * @return ModInterface
     * @throws ItemException
     */
    public static function create(array $data): ModInterface
    {
        return new Mod(
            self::stat($data, 'name', ModException::INVALID_NAME),
            self::string($data, 'prefix', ModException::INVALID_PREFIX),
            self::string($data, 'suffix', ModException::INVALID_SUFFIX),
            self::int($data, 'min_value', ModException::INVALID_MIN_VALUE),
            self::int($data, 'max_value', ModException::INVALID_MAX_VALUE),
        );
    }
}
