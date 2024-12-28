<?php

declare(strict_types=1);

namespace Item\Equip;

use Item\ItemException;

class EquipType implements EquipTypeInterface
{
    private static array $map = [
        self::RING           => 'ring',
        self::AMULET         => 'amulet',
        self::HELMET         => 'helmet',
        self::ARMOR          => 'armor',
        self::GLOVES         => 'gloves',
        self::BOOTS          => 'boots',
        self::LEGS           => 'legs',
        self::SHOULDERS      => 'shoulders',
        self::SHIELD         => 'shield',

        self::SWORD          => 'sword',
        self::AXE            => 'axe',
        self::MACE           => 'mace',
        self::BOW            => 'bow',
        self::STAFF          => 'staff',
        self::DAGGER         => 'dagger',

        self::TWO_HAND_SWORD => 'two hand sword',
        self::TWO_HAND_AXE   => 'two hand axe',
        self::TWO_HAND_MACE  => 'two hand mace',

        self::CROSSBOW       => 'crossbow',
    ];

    private int $id;

    private string $name;

    /**
     * @param int $id
     * @throws ItemException
     */
    public function __construct(int $id)
    {
        $this->id = $id;
        $this->setName($id);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param int $id
     * @throws ItemException
     */
    private function setName(int $id): void
    {
        if (!array_key_exists($id, self::$map)) {
            throw new ItemException(ItemException::UNKNOWN_EQUIP_TYPE . ': ' . $id);
        }

        $this->name = self::$map[$id];
    }
}
