<?php

declare(strict_types=1);

namespace Tests\Item\Collection;

use Item\Base\Base;
use Item\Collection\ItemCollection;
use Item\Defense\Defense;
use Item\Item;
use Item\ItemException;
use Item\ItemInterface;
use Item\Offense\Offense;
use Item\Type\Damage\DamageType;
use Item\Type\Damage\DamageTypeInterface;
use Item\Type\Equip\EquipType;
use Item\Type\Equip\EquipTypeInterface;
use Item\Type\ItemType;
use Item\Type\ItemTypeInterface;
use Item\Type\Magic\MagicType;
use Item\Type\Magic\MagicTypeInterface;
use Item\Type\MagicQuality\MagicQuality;
use Item\Type\MagicQuality\MagicQualityInterface;
use Item\Type\Section\SectionType;
use Item\Type\Section\SectionTypeInterface;
use Item\Type\Weapon\WeaponType;
use Item\Type\Weapon\WeaponTypeInterface;
use PHPUnit\Framework\TestCase;

class ItemCollectionTest extends TestCase
{
    /**
     * @throws ItemException
     */
    public function testItemCollectionAddSuccess(): void
    {
        $collection = new ItemCollection();
        $item = $this->getSword();

        self::assertCount(0, $collection);

        $collection->add($item);

        self::assertCount(1, $collection);
        self::assertEquals($item, $collection->current());
    }

    /**
     * @throws ItemException
     */
    public function testItemCollectionAddFail(): void
    {
        $collection = new ItemCollection();

        $collection->add($this->getSword());

        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::ALREADY_EXIST);
        $collection->add($this->getSword());
    }

    /**
     * @return ItemInterface
     */
    private function getSword(): ItemInterface
    {
        $weaponType = new WeaponType(WeaponTypeInterface::SWORD);
        $damageType = new DamageType(DamageTypeInterface::ATTACK);

        return new Item(
            'b9e5f6ef-7047-414e-b162-6d100311209b',
            1546,
            23,
            'ba1a729c-894d-4652-b62d-76c466f48f69',
            'Sword',
            'icon.png',
            150,
            5,
            50,
            0,
            0,
            '',
            '',
            new ItemType(ItemTypeInterface::EQUIP),
            new MagicQuality(MagicQualityInterface::COMMON),
            new Base(100),
            new Offense($weaponType, $damageType),
            new Defense(),
            new EquipType(EquipTypeInterface::ONE_HAND),
            new SectionType(SectionTypeInterface::LEFT_HAND),
            null,
            null,
            new MagicType(MagicTypeInterface::ONE_HAND_WEAPON),
        );
    }
}
