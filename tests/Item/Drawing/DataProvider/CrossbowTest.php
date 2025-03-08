<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Crossbow;
use Item\Drawing\DrawingException;
use Item\ItemException;
use Item\Type\Equip\EquipTypeInterface;
use Item\Type\Gender\GenderTypeInterface;
use Item\Type\ItemTypeInterface;
use Item\Type\Magic\MagicTypeInterface;
use Item\Type\Material\MaterialTypeInterface;
use Item\Type\Section\SectionTypeInterface;
use Item\Type\Weapon\WeaponType;
use Item\Type\Weapon\WeaponTypeInterface;
use PHPUnit\Framework\TestCase;
use Tests\Mock\Drawing\DataProvider\DrawingMissMinLevelDataProvider;
use Tests\Mock\Drawing\DataProvider\DrawingNoArrayDataProvider;
use Tests\Mock\Drawing\DataProvider\DrawingNoFirstLevelDataProvider;

class CrossbowTest extends TestCase
{
    /**
     * @dataProvider getDataProvider
     * @param int $id
     * @param array $data
     * @param int $expectedPrice
     * @throws ItemException
     */
    public function testCrossbowGetSuccess(int $id, array $data, int $expectedPrice): void
    {
        $drawing = Crossbow::get($id);

        self::assertEquals($data['id'], $drawing->getId());
        self::assertEquals($data['name'], $drawing->getName());
        self::assertEquals($data['icon'], $drawing->getIcon());
        self::assertEquals($data['type_id'], $drawing->getType()->getId());
        self::assertEquals($data['equip_type_id'], $drawing->getEquipType()->getId());
        self::assertEquals($data['weapon_type_id'], $drawing->getWeaponType()->getId());
        self::assertEquals($data['magic_type_id'], $drawing->getMagicType()->getId());
        self::assertNull($drawing->getArmorType());
        self::assertNull($drawing->getPotionType());
        self::assertEquals($data['section_type_id'], $drawing->getSectionType()->getId());
        self::assertEquals($data['material_type_id'], $drawing->getMaterialType()->getId());
        self::assertEquals($data['gender_type_id'], $drawing->getGenderType()->getId());
        self::assertEquals($expectedPrice, $drawing->getPrice());
        self::assertEquals($data['min_level'], $drawing->getMinLevel());
        self::assertEquals($data['strength'], $drawing->getStrength());
        self::assertEquals($data['intelligence'], $drawing->getIntelligence());
        self::assertEquals($data['dexterity'], $drawing->getDexterity());

        self::assertSameSize($data['stats'], $drawing->getStats());

        $i = 0;
        foreach ($drawing->getStats() as $stat) {
            self::assertEquals($data['stats'][$i]['name'], $stat->getName());
            self::assertEquals($data['stats'][$i]['value'], $stat->getValue());
            self::assertEquals($data['stats'][$i]['quality'], $stat->isQuality());
            self::assertEquals($data['stats'][$i]['suffix'], $stat->getSuffix());
            $i++;
        }
    }

    /**
     * @throws ItemException
     */
    public function testCrossbowGetAll(): void
    {
        self::assertCount(18, Crossbow::getAll());
    }

    /**
     * @throws ItemException
     */
    public function testCrossbowGetNotFound(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(DrawingException::NOT_FOUND);
        Crossbow::get(9999999);
    }

    /**
     * @throws ItemException
     */
    public function testCrossbowGetRandomSuccess(): void
    {
        $drawing = Crossbow::getRandom(15);
        self::assertEquals(WeaponType::CROSSBOW, $drawing->getWeaponType()->getId());
    }

    public function testCrossbowGetRandomInvalidLevel(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::INVALID_FILTER);
        Crossbow::getRandom(0);
    }

    public function testCrossbowGetRandomNoDrawings(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(DrawingException::EMPTY_SELECTED);
        DrawingNoFirstLevelDataProvider::getRandom(5);
    }

    public function testCrossbowGetRandomNoArray(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(DrawingException::EXPECTED_ARRAY);
        DrawingNoArrayDataProvider::getRandom(30);
    }

    public function testCrossbowGetRandomMissMinLevel(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(DrawingException::INVALID_MIN_LEVEL);
        DrawingMissMinLevelDataProvider::getRandom(30);
    }

    /**
     * @return array
     */
    public function getDataProvider(): array
    {
        return [
            [
                1001,
                [
                    'id'               => 1001,
                    'name'             => 'Light Crossbow',
                    'icon'             => '/icon/items/crossbow/01.png',
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::TWO_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::CROSSBOW,
                    'magic_type_id'    => MagicTypeInterface::TWO_HAND_WEAPON,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'material_type_id' => MaterialTypeInterface::WOOD,
                    'gender_type_id'   => GenderTypeInterface::MALE,
                    'price'            => 600,
                    'min_level'        => 1,
                    'strength'         => 0.6,
                    'intelligence'     => 0.0,
                    'dexterity'        => 0.6,
                    'stats'            => [
                        [
                            'name'    => 'offense.attackSpeed',
                            'value'   => 100,
                            'quality' => false,
                            'suffix'  => '',
                        ],
                        [
                            'name'    => 'offense.criticalChance',
                            'value'   => 10,
                            'quality' => false,
                            'suffix'  => '%',
                        ],
                        [
                            'name'    => 'offense.criticalMultiplier',
                            'value'   => 200,
                            'quality' => false,
                            'suffix'  => '%',
                        ],
                        [
                            'name'    => 'offense.blockIgnore',
                            'value'   => 100,
                            'quality' => false,
                            'suffix'  => '%',
                        ],
                    ],
                ],
                486,
            ],
        ];
    }
}
