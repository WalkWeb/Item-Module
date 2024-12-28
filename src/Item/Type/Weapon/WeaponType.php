<?php

declare(strict_types=1);

namespace Item\Type\Weapon;

use Item\ItemException;

class WeaponType implements WeaponTypeInterface
{
    private static array $map = [
        self::SWORD                => 'sword',
        self::AXE                  => 'axe',
        self::MACE                 => 'mace',
        self::DAGGER               => 'dagger',
        self::SPEAR                => 'spear',
        self::WAND                 => 'wand',
        self::HEAVY_SWORD          => 'heavy sword',
        self::HEAVY_AXE            => 'heavy axe',
        self::HEAVY_MACE           => 'heavy mace',

        self::BOW                  => 'bow',
        self::STAFF                => 'staff',
        self::TWO_HAND_SWORD       => 'two hand sword',
        self::TWO_HAND_AXE         => 'two hand axe',
        self::TWO_HAND_MACE        => 'two hand mace',
        self::TWO_HAND_HEAVY_SWORD => 'two hand heavy sword',
        self::TWO_HAND_HEAVY_AXE   => 'two hand heavy axe',
        self::TWO_HAND_HEAVY_MACE  => 'two hand heavy mace',
        self::LANCE                => 'lance',
        self::CROSSBOW             => 'crossbow',

        self::FIST                 => 'fist',
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
            throw new ItemException(ItemException::UNKNOWN_WEAPON_TYPE . ': ' . $id);
        }

        $this->name = self::$map[$id];
    }
}
