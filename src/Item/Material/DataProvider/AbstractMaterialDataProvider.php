<?php

declare(strict_types=1);

namespace Item\Material\DataProvider;

use Item\Drawing\DrawingInterface;
use Item\ItemException;
use Item\Material\Collection\MaterialCollection;
use Item\Material\Collection\MaterialCollectionFactory;
use Item\Material\MaterialException;
use Item\Material\MaterialFactory;
use Item\Material\MaterialInterface;
use Item\Type\Material\MaterialTypeInterface;

abstract class AbstractMaterialDataProvider
{
    protected static array $materials = [];

    /**
     * @param string $id
     * @return MaterialInterface
     * @throws ItemException
     */
    public static function get(string $id): MaterialInterface
    {
        if (!array_key_exists($id, static::$materials)) {
            throw new ItemException(MaterialException::NOT_FOUND);
        }

        return MaterialFactory::create(static::$materials[$id]);
    }

    /**
     * TODO move ...?
     *
     * @param DrawingInterface $drawing
     * @param int $itemLevel
     * @return MaterialInterface
     * @throws ItemException
     */
    public static function getByDrawing(DrawingInterface $drawing, int $itemLevel): MaterialInterface
    {
        if (!$drawing->getMaterialType()) {
            throw new ItemException(MaterialException::EXPECTED_EQUIP);
        }

        if ($drawing->getMaterialType()->getId() === MaterialTypeInterface::METAL) {
            return Metal::getRandom($itemLevel);
        }

        if ($drawing->getMaterialType()->getId() === MaterialTypeInterface::WOOD) {
            return Wood::getRandom($itemLevel);
        }

        if ($drawing->getMaterialType()->getId() === MaterialTypeInterface::LEATHER) {
            return Leather::getRandom($itemLevel);
        }

        return Fabric::getRandom($itemLevel);
    }

    /**
     * @return MaterialCollection
     * @throws ItemException
     */
    public static function getAll(): MaterialCollection
    {
        return MaterialCollectionFactory::create(static::$materials);
    }

    /**
     * @param int $itemLevel
     * @return MaterialInterface
     * @throws ItemException
     */
    public static function getRandom(int $itemLevel): MaterialInterface
    {
        if ($itemLevel < 1) {
            throw new ItemException(ItemException::INVALID_FILTER);
        }

        $selected = [];

        foreach (static::$materials as $material) {
            if (!is_array($material)) {
                throw new ItemException(MaterialException::EXPECTED_ARRAY);
            }

            if (!array_key_exists('level', $material) || !is_int($material['level'])) {
                throw new ItemException(MaterialException::INVALID_LEVEL);
            }

            if ($material['level'] <= $itemLevel) {
                $selected[] = $material;
            }
        }

        if (count($selected) === 0) {
            throw new ItemException(MaterialException::EMPTY_SELECTED);
        }

        return MaterialFactory::create($selected[array_rand($selected)]);
    }
}
