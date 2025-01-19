<?php

declare(strict_types=1);

namespace Tests\Item\Drawing;

use Item\Drawing\DrawingException;
use Item\Drawing\DrawingFactory;
use Item\ItemException;
use Item\Type\Armor\ArmorTypeInterface;
use Item\Type\Equip\EquipTypeInterface;
use Item\Type\ItemTypeInterface;
use Item\Type\Material\MaterialTypeInterface;
use Item\Type\Potion\PotionTypeInterface;
use Item\Type\Section\SectionTypeInterface;
use Item\Type\Weapon\WeaponTypeInterface;
use PHPUnit\Framework\TestCase;

class DrawingFactoryTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param array $data
     * @throws ItemException
     */
    public function testDrawingFactoryCreateSuccess(array $data): void
    {
        $drawing = DrawingFactory::create($data);

        self::assertEquals($data['id'], $drawing->getId());
        self::assertEquals($data['name'], $drawing->getName());
        self::assertEquals($data['icon'], $drawing->getIcon());
        self::assertEquals($data['price'], $drawing->getPrice());
        self::assertEquals($data['min_level'], $drawing->getMinLevel());
        self::assertEquals($data['type_id'], $drawing->getType()->getId());

        if ($data['equip_type_id']) {
            self::assertEquals($data['equip_type_id'], $drawing->getEquipType()->getId());
        } else {
            self::assertNull($drawing->getEquipType());
        }

        if ($data['section_type_id']) {
            self::assertEquals($data['section_type_id'], $drawing->getSectionType()->getId());
        } else {
            self::assertNull($drawing->getSectionType());
        }

        if ($data['weapon_type_id']) {
            self::assertEquals($data['weapon_type_id'], $drawing->getWeaponType()->getId());
        } else {
            self::assertNull($drawing->getWeaponType());
        }

        if ($data['armor_type_id']) {
            self::assertEquals($data['armor_type_id'], $drawing->getArmorType()->getId());
        } else {
            self::assertNull($drawing->getArmorType());
        }

        if ($data['potion_type_id']) {
            self::assertEquals($data['potion_type_id'], $drawing->getPotionType()->getId());
        } else {
            self::assertNull($drawing->getPotionType());
        }

        if ($data['material_type_id']) {
            self::assertEquals($data['material_type_id'], $drawing->getMaterialType()->getId());
        } else {
            self::assertNull($drawing->getMaterialType());
        }
    }

    /**
     * @dataProvider failDataProvider
     * @param array $data
     * @param string $error
     */
    public function testDrawingFactoryCreateFail(array $data, string $error): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage($error);
        DrawingFactory::create($data);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            // weapon
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
            ],
            // armor
            [
                [
                    'id'               => 54,
                    'name'             => 'Helmet',
                    'icon'             => 'icon.png',
                    'price'            => 2000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::HELMET,
                    'section_type_id'  => SectionTypeInterface::HELMET,
                    'weapon_type_id'   => null,
                    'armor_type_id'    => ArmorTypeInterface::HEAVY,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
            ],
            // potion
            [
                [
                    'id'               => 28,
                    'name'             => 'Heal Potion',
                    'icon'             => 'icon.png',
                    'price'            => 300,
                    'min_level'        => 15,
                    'type_id'          => ItemTypeInterface::POTION,
                    'equip_type_id'    => null,
                    'section_type_id'  => null,
                    'weapon_type_id'   => null,
                    'armor_type_id'    => null,
                    'potion_type_id'   => PotionTypeInterface::LIFE,
                    'material_type_id' => null,
                ],
            ],
            // material
            [
                [
                    'id'               => 31,
                    'name'             => 'Steel',
                    'icon'             => 'icon.png',
                    'price'            => 250,
                    'min_level'        => 1,
                    'type_id'          => ItemTypeInterface::MATERIAL,
                    'equip_type_id'    => null,
                    'section_type_id'  => null,
                    'weapon_type_id'   => null,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => MaterialTypeInterface::METAL,
                ],
            ],
            // book
            [
                [
                    'id'               => 33,
                    'name'             => 'Book',
                    'icon'             => 'icon.png',
                    'price'            => 1250,
                    'min_level'        => 1,
                    'type_id'          => ItemTypeInterface::BOOK,
                    'equip_type_id'    => null,
                    'section_type_id'  => null,
                    'weapon_type_id'   => null,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function failDataProvider(): array
    {
        return [
            // miss id
            [
                [
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_ID,
            ],
            // id invalid type
            [
                [
                    'id'               => null,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_ID,
            ],
            // miss name
            [
                [
                    'id'               => 143,
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_NAME,
            ],
            // name invalid type
            [
                [
                    'id'               => 143,
                    'name'             => true,
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_NAME,
            ],
            // miss icon
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_ICON,
            ],
            // icon invalid type
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => null,
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_ICON,
            ],
            // miss price
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_PRICE,
            ],
            // price invalid type
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => '1000',
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_PRICE,
            ],
            // miss min_level
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_MIN_LEVEL,
            ],
            // min_level invalid type
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => [4],
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_MIN_LEVEL,
            ],
            // miss type_id
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_TYPE_ID,
            ],
            // type_id invalid type
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => null,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_TYPE_ID,
            ],
            // miss equip_type_id
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_EQUIP_TYPE_ID,
            ],
            // equip_type_id invalid type
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => '123',
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_EQUIP_TYPE_ID,
            ],
            // miss section_type_id
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_SECTION_TYPE_ID,
            ],
            // section_type_id invalid type
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => 4.3,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_SECTION_TYPE_ID,
            ],
            // miss weapon_type_id
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_WEAPON_TYPE_ID,
            ],
            // weapon_type_id invalid type
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => true,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_WEAPON_TYPE_ID,
            ],
            // miss armor_type_id
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_ARMOR_TYPE_ID,
            ],
            // armor_type_id invalid type
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => [],
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_ARMOR_TYPE_ID,
            ],
            // miss potion_type_id
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_POTION_TYPE_ID,
            ],
            // potion_type_id invalid type
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => false,
                    'material_type_id' => null,
                ],
                DrawingException::INVALID_POTION_TYPE_ID,
            ],
            // miss material_type_id
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                ],
                DrawingException::INVALID_MATERIAL_TYPE_ID,
            ],
            // material_type_id invalid type
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => '',
                ],
                DrawingException::INVALID_MATERIAL_TYPE_ID,
            ],
            // type_id = equip && equip_type_id = null
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => null,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::MISS_EQUIP_TYPE,
            ],
            // type_id = equip && section_type_id = null
            [
                [
                    'id'               => 143,
                    'name'             => 'Sword',
                    'icon'             => 'icon.png',
                    'price'            => 1000,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::SWORD,
                    'section_type_id'  => null,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::MISS_SECTION_TYPE,
            ],
            // type_id = potion && potion_type_id = null
            [
                [
                    'id'               => 143,
                    'name'             => 'Heal Potion',
                    'icon'             => 'icon.png',
                    'price'            => 200,
                    'min_level'        => 4,
                    'type_id'          => ItemTypeInterface::POTION,
                    'equip_type_id'    => null,
                    'section_type_id'  => null,
                    'weapon_type_id'   => null,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::MISS_POTION_TYPE,
            ],
            // type_id = potion && potion_type_id = null
            [
                [
                    'id'               => 123,
                    'name'             => 'Steel',
                    'icon'             => 'icon.png',
                    'price'            => 100,
                    'min_level'        => 1,
                    'type_id'          => ItemTypeInterface::MATERIAL,
                    'equip_type_id'    => null,
                    'section_type_id'  => null,
                    'weapon_type_id'   => null,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                ],
                DrawingException::MISS_MATERIAL_TYPE,
            ],
        ];
    }
}
