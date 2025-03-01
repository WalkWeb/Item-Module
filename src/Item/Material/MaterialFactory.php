<?php

declare(strict_types=1);

namespace Item\Material;

use Item\ItemException;
use Item\Material\Element\MaterialElement;
use Item\Traits\ValidationTrait;

class MaterialFactory
{
    use ValidationTrait;

    /**
     * @param array $data
     * @return MaterialInterface
     * @throws ItemException
     */
    public static function create(array $data): MaterialInterface
    {
        return new Material(
            self::string($data, 'name', MaterialException::INVALID_NAME),
            self::string($data, 'icon', MaterialException::INVALID_ICON),
            self::int($data, 'level', MaterialException::INVALID_LEVEL),
            self::float($data, 'quality', MaterialException::INVALID_QUALITY),
            self::string($data, 'prefix', MaterialException::INVALID_PREFIX),
            self::string($data, 'suffix', MaterialException::INVALID_SUFFIX),
            new MaterialElement(self::int($data, 'element', MaterialException::INVALID_ELEMENT)),
        );
    }
}
