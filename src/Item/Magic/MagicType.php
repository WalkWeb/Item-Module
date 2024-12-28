<?php

declare(strict_types=1);

namespace Item\Magic;

use Item\ItemException;

class MagicType implements MagicTypeInterface
{
    private static array $map = [
        self::RING            => 'ring',
        self::AMULET          => 'amulet',
        self::HELMET          => 'helmet',
        self::ARMOR           => 'armor',
        self::GLOVES          => 'gloves',
        self::BOOTS           => 'boots',
        self::LEGS            => 'legs',
        self::SHIELD          => 'shield',
        self::ONE_HAND_WEAPON => 'one hand weapon',
        self::TWO_HAND_WEAPON => 'two hand weapon',
        self::SHOULDERS       => 'shoulders',
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
            throw new ItemException(ItemException::UNKNOWN_MAGIC_TYPE . ': ' . $id);
        }

        $this->name = self::$map[$id];
    }
}
