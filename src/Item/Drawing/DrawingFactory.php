<?php

declare(strict_types=1);

namespace Item\Drawing;

use Item\ItemException;
use Item\Traits\ValidationTrait;
use Item\Type\ItemType;

class DrawingFactory
{
    use ValidationTrait;

    /**
     * @param array $data
     * @return DrawingInterface
     * @throws ItemException
     */
    public static function create(array $data): DrawingInterface
    {
        return new Drawing(
            self::int($data, 'id', DrawingException::INVALID_ID),
            self::string($data, 'name', DrawingException::INVALID_NAME),
            self::string($data, 'icon', DrawingException::INVALID_ICON),
            self::int($data, 'price', DrawingException::INVALID_PRICE),
            self::int($data, 'min_level', DrawingException::INVALID_MIN_LEVEL),
            new ItemType(self::int($data, 'type_id', DrawingException::INVALID_TYPE_ID)),
        );
    }
}
