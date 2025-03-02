<?php

declare(strict_types=1);

namespace Tests\Item\Material\DataProvider;

use Exception;
use Item\Affix\Type\AffixTypeInterface;
use Item\Drawing\DrawingFactory;
use Item\ItemException;
use Item\Material\DataProvider\Metal;
use Item\Material\Element\MaterialElement;
use Item\Material\MaterialException;
use Item\Material\MaterialInterface;
use Item\Type\Armor\ArmorTypeInterface;
use Item\Type\Equip\EquipTypeInterface;
use Item\Type\Gender\GenderTypeInterface;
use Item\Type\ItemTypeInterface;
use Item\Type\Magic\MagicTypeInterface;
use Item\Type\Material\MaterialTypeInterface;
use Item\Type\Potion\PotionTypeInterface;
use Item\Type\Section\SectionTypeInterface;
use Item\Type\Weapon\WeaponTypeInterface;
use PHPUnit\Framework\TestCase;
use Tests\Mock\Material\DataProvider\MaterialMissLevelDataProvider;
use Tests\Mock\Material\DataProvider\MaterialNoArrayDataProvider;
use Tests\Mock\Material\DataProvider\MaterialNoFirstLevelDataProvider;

class MetalTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param string $id
     * @param array $expected
     * @throws ItemException
     */
    public function testMetalGetSuccess(string $id, array $expected): void
    {
        $material = Metal::get($id);

        self::assertEquals($expected['name'], $material->getName());
        self::assertEquals($expected['icon'], $material->getIcon());
        self::assertEquals($expected['level'], $material->getLevel());
        self::assertEquals($expected['quality'], $material->getQuality());
        self::assertEquals($expected['prefix'], $material->getPrefix());
        self::assertEquals($expected['suffix'], $material->getSuffix());
        self::assertEquals($expected['element'], $material->getElement()->getId());
    }

    public function testMetalGetFail(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(MaterialException::NOT_FOUND);
        Metal::get('unknown');
    }

    /**
     * @throws ItemException
     */
    public function testMetalGetAll(): void
    {
        self::assertCount(16, Metal::getAll());
    }

    /**
     * @throws Exception
     */
    public function testMetalGetRandomSuccess(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $itemLevel = random_int(1, 25);
            $material = Metal::getRandom($itemLevel);
            self::assertTrue($material->getLevel() <= $itemLevel);
        }
    }

    public function testMetalGetRandomInvalidItemLevel(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::INVALID_FILTER);
        Metal::getRandom(0);
    }

    public function testMaterialGetRandomEmptySelected(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(MaterialException::EMPTY_SELECTED);
        MaterialNoFirstLevelDataProvider::getRandom(5);
    }

    public function testMaterialGetRandomMissLevel(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(MaterialException::INVALID_LEVEL);
        MaterialMissLevelDataProvider::getRandom(15);
    }

    public function testMaterialGetRandomInvalidData(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(MaterialException::EXPECTED_ARRAY);
        MaterialNoArrayDataProvider::getRandom(1);
    }

    /**
     * TODO check type material
     *
     * @throws ItemException
     */
    public function testMaterialGetByDrawingSuccess(): void
    {
        self::assertInstanceOf(MaterialInterface::class, Metal::getByDrawing(DrawingFactory::create([
            'id'               => 5001,
            'name'             => 'Wanderer‘s Cape',
            'icon'             => '/icon/items/armors/04.png',
            'type_id'          => ItemTypeInterface::EQUIP,
            'equip_type_id'    => EquipTypeInterface::ARMOR,
            'armor_type_id'    => ArmorTypeInterface::ROBE,
            'magic_type_id'    => MagicTypeInterface::ARMOR,
            'section_type_id'  => SectionTypeInterface::ARMOR,
            'material_type_id' => MaterialTypeInterface::CLOTH,
            'gender_type_id'   => GenderTypeInterface::FEMALE,
            'weight'           => 25,
            'min_level'        => 1,
            'strength'         => 0.0,
            'intelligence'     => 1.0,
            'dexterity'        => 0.0,
            'affix_exception'  => [
                AffixTypeInterface::ADD_DEFENSE,
                AffixTypeInterface::INCREASE_DEFENSE,
            ],
            'stats'            => [],
        ]), 1));

        self::assertInstanceOf(MaterialInterface::class, Metal::getByDrawing(DrawingFactory::create([
            'id'               => 5011,
            'name'             => 'Vest',
            'icon'             => '/icon/items/armors/06.png',
            'type_id'          => ItemTypeInterface::EQUIP,
            'equip_type_id'    => EquipTypeInterface::ARMOR,
            'armor_type_id'    => ArmorTypeInterface::LIGHT,
            'magic_type_id'    => MagicTypeInterface::ARMOR,
            'section_type_id'  => SectionTypeInterface::ARMOR,
            'material_type_id' => MaterialTypeInterface::LEATHER,
            'gender_type_id'   => GenderTypeInterface::MALE,
            'weight'           => 90,
            'min_level'        => 1,
            'strength'         => 0.0,
            'intelligence'     => 0.0,
            'dexterity'        => 1.0,
            'affix_exception'  => [],
            'stats'            => [],
        ]), 1));

        self::assertInstanceOf(MaterialInterface::class, Metal::getByDrawing(DrawingFactory::create([
            'id'               => 5021,
            'name'             => 'Chainmail',
            'icon'             => '/icon/items/armors/08.png',
            'type_id'          => ItemTypeInterface::EQUIP,
            'equip_type_id'    => EquipTypeInterface::ARMOR,
            'armor_type_id'    => ArmorTypeInterface::MIDDLE,
            'magic_type_id'    => MagicTypeInterface::ARMOR,
            'section_type_id'  => SectionTypeInterface::ARMOR,
            'material_type_id' => MaterialTypeInterface::METAL,
            'gender_type_id'   => GenderTypeInterface::FEMALE,
            'weight'           => 170,
            'min_level'        => 1,
            'strength'         => 0.6,
            'intelligence'     => 0.0,
            'dexterity'        => 0.6,
            'affix_exception'  => [],
            'stats'            => [],
        ]), 1));

        self::assertInstanceOf(MaterialInterface::class, Metal::getByDrawing(DrawingFactory::create([
            'id'               => 1101,
            'name'             => 'Staff',
            'icon'             => '/icon/items/staffs/01.png',
            'type_id'          => ItemTypeInterface::EQUIP,
            'equip_type_id'    => EquipTypeInterface::TWO_HAND,
            'weapon_type_id'   => WeaponTypeInterface::STAFF,
            'magic_type_id'    => MagicTypeInterface::TWO_HAND_WEAPON,
            'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
            'material_type_id' => MaterialTypeInterface::WOOD,
            'gender_type_id'   => GenderTypeInterface::MALE,
            'weight'           => 105,
            'min_level'        => 1,
            'strength'         => 0.0,
            'intelligence'     => 1.0,
            'dexterity'        => 0.0,
            'affix_exception'  => [
                AffixTypeInterface::INCREASE_ATTACK_SPEED,
                AffixTypeInterface::INCREASE_ACCURACY,
                AffixTypeInterface::ADD_ACCURACY,
            ],
            'stats'            => [
                [
                    'name'    => 'offense.castSpeed',
                    'value'   => 100,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '',
                ],
                [
                    'name'    => 'offense.criticalChance',
                    'value'   => 8,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                [
                    'name'    => 'offense.criticalMultiplier',
                    'value'   => 200,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                [
                    'name'    => 'base.bonusConcentration',
                    'value'   => 50,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
            ],
        ]), 1));
    }

    /**
     * @throws ItemException
     */
    public function testMaterialGetByDrawingFail(): void
    {
        $drawing = DrawingFactory::create([
            'id'               => 28,
            'name'             => 'Heal Potion',
            'icon'             => 'icon.png',
            'price'            => 300,
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
            'min_strength'     => 50,
            'min_dexterity'    => 30,
            'min_intelligence' => 10,
            'stats'            => [],
        ]);

        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(MaterialException::EXPECTED_EQUIP);
        Metal::getByDrawing($drawing, 1);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                'copper',
                [
                    'name'    => 'Copper',
                    'icon'    => '/icon/metals/copper.png',
                    'level'   => 1,
                    'quality' => 0.8,
                    'prefix'  => 'copper',
                    'suffix'  => '',
                    'element' => MaterialElement::PHYSICAL,
                ],
            ],
        ];
    }
}
