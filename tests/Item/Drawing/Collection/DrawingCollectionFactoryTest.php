<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\Collection;

use Item\Drawing\Collection\DrawingCollectionFactory;
use Item\Drawing\DrawingException;
use Item\ItemException;
use Item\Type\ItemTypeInterface;
use Item\Type\Material\MaterialTypeInterface;
use Item\Type\Potion\PotionTypeInterface;
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
            self::assertEquals($data[$i]['weight'], $drawing->getWeight());
            self::assertEquals($data[$i]['min_level'], $drawing->getMinLevel());
            self::assertEquals($data[$i]['strength'], $drawing->getStrength());
            self::assertEquals($data[$i]['dexterity'], $drawing->getDexterity());
            self::assertEquals($data[$i]['intelligence'], $drawing->getIntelligence());
            self::assertEquals($data[$i]['affix_exception'], $drawing->getAffixException());
            self::assertEquals($data[$i]['type_id'], $drawing->getType()->getId());
            self::assertSameSize($data[$i]['stats'], $drawing->getStats());

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
                        'id'               => 28,
                        'name'             => 'Heal Potion',
                        'icon'             => 'icon.png',
                        'weight'           => 10,
                        'min_level'        => 15,
                        'strength'         => 0.0,
                        'dexterity'        => 0.0,
                        'intelligence'     => 0.0,
                        'affix_exception'  => [],
                        'type_id'          => ItemTypeInterface::POTION,
                        'equip_type_id'    => null,
                        'section_type_id'  => null,
                        'weapon_type_id'   => null,
                        'armor_type_id'    => null,
                        'potion_type_id'   => PotionTypeInterface::LIFE,
                        'material_type_id' => null,
                        'gender_type_id'   => null,
                        'magic_type_id'    => null,
                        'stats'            => [],
                    ],
                    [
                        'id'               => 31,
                        'name'             => 'Steel',
                        'icon'             => 'icon.png',
                        'price'            => 250,
                        'weight'           => 25,
                        'min_level'        => 1,
                        'strength'         => 0.0,
                        'dexterity'        => 0.0,
                        'intelligence'     => 0.0,
                        'affix_exception'  => [],
                        'type_id'          => ItemTypeInterface::MATERIAL,
                        'equip_type_id'    => null,
                        'section_type_id'  => null,
                        'weapon_type_id'   => null,
                        'armor_type_id'    => null,
                        'potion_type_id'   => null,
                        'material_type_id' => MaterialTypeInterface::METAL,
                        'gender_type_id'   => null,
                        'magic_type_id'    => null,
                        'stats'            => [],
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
                        'id'               => 28,
                        'name'             => 'Heal Potion',
                        'icon'             => 'icon.png',
                        'weight'           => 10,
                        'min_level'        => 15,
                        'strength'         => 0.0,
                        'dexterity'        => 0.0,
                        'intelligence'     => 0.0,
                        'affix_exception'  => [],
                        'type_id'          => ItemTypeInterface::POTION,
                        'equip_type_id'    => null,
                        'section_type_id'  => null,
                        'weapon_type_id'   => null,
                        'armor_type_id'    => null,
                        'potion_type_id'   => PotionTypeInterface::LIFE,
                        'material_type_id' => null,
                        'gender_type_id'   => null,
                        'magic_type_id'    => null,
                        'stats'            => [],
                    ],
                    [
                        'id'               => 28,
                        'name'             => 'Steel',
                        'icon'             => 'icon.png',
                        'price'            => 250,
                        'weight'           => 25,
                        'min_level'        => 1,
                        'strength'         => 0.0,
                        'dexterity'        => 0.0,
                        'intelligence'     => 0.0,
                        'affix_exception'  => [],
                        'type_id'          => ItemTypeInterface::MATERIAL,
                        'equip_type_id'    => null,
                        'section_type_id'  => null,
                        'weapon_type_id'   => null,
                        'armor_type_id'    => null,
                        'potion_type_id'   => null,
                        'material_type_id' => MaterialTypeInterface::METAL,
                        'gender_type_id'   => null,
                        'magic_type_id'    => null,
                        'stats'            => [],
                    ],
                ],
                DrawingException::ALREADY_EXIST,
            ],
            // invalid data
            [
                [
                    [
                        'id'               => 28,
                        'name'             => 'Heal Potion',
                        'icon'             => 'icon.png',
                        'weight'           => 10,
                        'min_level'        => 15,
                        'strength'         => 0.0,
                        'dexterity'        => 0.0,
                        'intelligence'     => 0.0,
                        'affix_exception'  => [],
                        'type_id'          => ItemTypeInterface::POTION,
                        'equip_type_id'    => null,
                        'section_type_id'  => null,
                        'weapon_type_id'   => null,
                        'armor_type_id'    => null,
                        'potion_type_id'   => PotionTypeInterface::LIFE,
                        'material_type_id' => null,
                        'gender_type_id'   => null,
                        'magic_type_id'    => null,
                        'stats'            => [],
                    ],
                    432,
                ],
                DrawingException::EXPECTED_ARRAY,
            ],
        ];
    }
}
