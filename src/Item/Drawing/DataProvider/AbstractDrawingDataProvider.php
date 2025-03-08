<?php

declare(strict_types=1);

namespace Item\Drawing\DataProvider;

use Item\Drawing\Collection\DrawingCollection;
use Item\Drawing\Collection\DrawingCollectionFactory;
use Item\Drawing\DrawingException;
use Item\Drawing\DrawingFactory;
use Item\Drawing\DrawingInterface;
use Item\ItemException;

abstract class AbstractDrawingDataProvider
{
    protected static array $drawings = [];

    /**
     * @param int $id
     * @return DrawingInterface
     * @throws ItemException
     */
    public static function get(int $id): DrawingInterface
    {
        if (!array_key_exists($id, static::$drawings)) {
            throw new ItemException(DrawingException::NOT_FOUND);
        }

        return DrawingFactory::create(static::$drawings[$id]);
    }

    /**
     * @return DrawingCollection
     * @throws ItemException
     */
    public static function getAll(): DrawingCollection
    {
        return DrawingCollectionFactory::create(static::$drawings);
    }

    /**
     * @param int $itemLevel
     * @return DrawingInterface
     * @throws ItemException
     */
    public static function getRandom(int $itemLevel): DrawingInterface
    {
        if ($itemLevel < 1) {
            throw new ItemException(ItemException::INVALID_FILTER);
        }

        $selected = [];

        foreach (static::$drawings as $drawing) {
            if (!is_array($drawing)) {
                throw new ItemException(DrawingException::EXPECTED_ARRAY);
            }

            if (!array_key_exists('min_level', $drawing) || !is_int($drawing['min_level'])) {
                throw new ItemException(DrawingException::INVALID_MIN_LEVEL);
            }

            if ($drawing['min_level'] <= $itemLevel) {
                $selected[] = $drawing;
            }
        }

        if (count($selected) === 0) {
            throw new ItemException(DrawingException::EMPTY_SELECTED);
        }

        return DrawingFactory::create($selected[array_rand($selected)]);
    }
}
