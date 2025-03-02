<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\Collection;

use Item\Drawing\Collection\DrawingCollectionFactory;
use Item\Drawing\DrawingException;
use Item\ItemException;
use Item\Type\Equip\EquipTypeInterface;
use Item\Type\Gender\GenderTypeInterface;
use Item\Type\ItemTypeInterface;
use Item\Type\Section\SectionTypeInterface;
use Item\Type\Weapon\WeaponTypeInterface;
use PHPUnit\Framework\TestCase;

class DrawingCollectionFactoryTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param array $data
     * @throws ItemException
     */
    public function testDrawingCollectionFactoryCreateSuccess(array $data): void
    {
        $collection = DrawingCollectionFactory::create($data);

        self::assertSameSize($data, $collection);

        $i = 0;
        foreach ($collection as $drawing) {
            self::assertEquals($data[$i]['id'], $drawing->getId());
            self::assertEquals($data[$i]['name'], $drawing->getName());
            self::assertEquals($data[$i]['icon'], $drawing->getIcon());
            self::assertEquals($data[$i]['min_level'], $drawing->getMinLevel());
            self::assertEquals($data[$i]['type_id'], $drawing->getType()->getId());

            $i++;
        }
    }

    /**
     * @dataProvider failDataProvider
     * @param array $data
     * @param string $error
     * @throws ItemException
     */
    public function testDrawingCollectionFactoryCreateFail(array $data, string $error): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage($error);
        DrawingCollectionFactory::create($data);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                [
                    [
                        'id'               => 143,
                        'name'             => 'Sword',
                        'icon'             => 'icon.png',
                        'price'            => 1000,
                        'min_level'        => 4,
                        'min_strength'     => 25,
                        'min_dexterity'    => 12,
                        'min_intelligence' => 0,
                        'type_id'          => ItemTypeInterface::EQUIP,
                        'equip_type_id'    => EquipTypeInterface::ONE_HAND,
                        'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                        'weapon_type_id'   => WeaponTypeInterface::SWORD,
                        'armor_type_id'    => null,
                        'potion_type_id'   => null,
                        'material_type_id' => null,
                        'gender_type_id'   => GenderTypeInterface::MALE,
                    ],
                    [
                        'id'               => 432,
                        'name'             => 'Staff',
                        'icon'             => 'icon.png',
                        'price'            => 2000,
                        'min_level'        => 4,
                        'min_strength'     => 0,
                        'min_dexterity'    => 0,
                        'min_intelligence' => 20,
                        'type_id'          => ItemTypeInterface::EQUIP,
                        'equip_type_id'    => EquipTypeInterface::TWO_HAND,
                        'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                        'weapon_type_id'   => WeaponTypeInterface::STAFF,
                        'armor_type_id'    => null,
                        'potion_type_id'   => null,
                        'material_type_id' => null,
                        'gender_type_id'   => GenderTypeInterface::MALE,
                    ],
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
            // double id
            [
                [
                    [
                        'id'               => 143,
                        'name'             => 'Sword',
                        'icon'             => 'icon.png',
                        'price'            => 1000,
                        'min_level'        => 4,
                        'min_strength'     => 25,
                        'min_dexterity'    => 12,
                        'min_intelligence' => 0,
                        'type_id'          => ItemTypeInterface::EQUIP,
                        'equip_type_id'    => EquipTypeInterface::ONE_HAND,
                        'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                        'weapon_type_id'   => WeaponTypeInterface::SWORD,
                        'armor_type_id'    => null,
                        'potion_type_id'   => null,
                        'material_type_id' => null,
                        'gender_type_id'   => GenderTypeInterface::MALE,
                    ],
                    [
                        'id'               => 143,
                        'name'             => 'Sword',
                        'icon'             => 'icon.png',
                        'price'            => 1000,
                        'min_level'        => 4,
                        'min_strength'     => 25,
                        'min_dexterity'    => 12,
                        'min_intelligence' => 0,
                        'type_id'          => ItemTypeInterface::EQUIP,
                        'equip_type_id'    => EquipTypeInterface::ONE_HAND,
                        'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                        'weapon_type_id'   => WeaponTypeInterface::SWORD,
                        'armor_type_id'    => null,
                        'potion_type_id'   => null,
                        'material_type_id' => null,
                        'gender_type_id'   => GenderTypeInterface::MALE,
                    ],
                ],
                DrawingException::ALREADY_EXIST,
            ],
            // invalid data
            [
                [
                    [
                        'id'               => 143,
                        'name'             => 'Sword',
                        'icon'             => 'icon.png',
                        'price'            => 1000,
                        'min_level'        => 4,
                        'min_strength'     => 25,
                        'min_dexterity'    => 12,
                        'min_intelligence' => 0,
                        'type_id'          => ItemTypeInterface::EQUIP,
                        'equip_type_id'    => EquipTypeInterface::ONE_HAND,
                        'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                        'weapon_type_id'   => WeaponTypeInterface::SWORD,
                        'armor_type_id'    => null,
                        'potion_type_id'   => null,
                        'material_type_id' => null,
                        'gender_type_id'   => GenderTypeInterface::MALE,
                    ],
                    432,
                ],
                DrawingException::EXPECTED_ARRAY,
            ],
        ];
    }
}
