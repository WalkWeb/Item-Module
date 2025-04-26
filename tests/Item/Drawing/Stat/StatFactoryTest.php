<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\Stat;

use Item\Drawing\DataProvider\Amulet;
use Item\Drawing\DataProvider\Armor;
use Item\Drawing\DataProvider\Boots;
use Item\Drawing\DataProvider\Crossbow;
use Item\Drawing\DataProvider\Gloves;
use Item\Drawing\DataProvider\Helmet;
use Item\Drawing\DataProvider\Legs;
use Item\Drawing\DataProvider\Ring;
use Item\Drawing\DataProvider\Shield;
use Item\Drawing\DataProvider\Shoulders;
use Item\Drawing\DataProvider\Sword;
use Item\Drawing\Drawing;
use Item\Drawing\DrawingFactory;
use Item\Drawing\DrawingInterface;
use Item\Drawing\Stat\StatCollection;
use Item\Drawing\Stat\StatException;
use Item\Drawing\Stat\StatFactory;
use Item\Drawing\Stat\StatInterface;
use Item\ItemException;
use Item\Material\DataProvider\Fabric;
use Item\Material\DataProvider\Leather;
use Item\Material\DataProvider\Metal;
use Item\Material\MaterialInterface;
use Item\Type\Armor\ArmorType;
use Item\Type\Armor\ArmorTypeInterface;
use Item\Type\Equip\EquipType;
use Item\Type\Equip\EquipTypeInterface;
use Item\Type\Gender\GenderType;
use Item\Type\Gender\GenderTypeInterface;
use Item\Type\ItemType;
use Item\Type\ItemTypeInterface;
use Item\Type\Magic\MagicType;
use Item\Type\Magic\MagicTypeInterface;
use Item\Type\Material\MaterialTypeInterface;
use Item\Type\Section\SectionTypeInterface;
use Item\Type\Weapon\WeaponTypeInterface;
use PHPUnit\Framework\TestCase;

class StatFactoryTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param array $data
     * @throws ItemException
     */
    public function testStatFactoryCreateSuccess(array $data): void
    {
        $stat = StatFactory::create($data);

        self::assertEquals($data['name'], $stat->getName());
        self::assertEquals($data['value'], $stat->getValue());
        self::assertEquals($data['quality'], $stat->isQuality());
        self::assertEquals($data['prefix'], $stat->getPrefix());
        self::assertEquals($data['suffix'], $stat->getSuffix());
    }

    /**
     * @dataProvider failDataProvider
     * @param array $data
     * @param string $error
     */
    public function testStatFactoryCreateFail(array $data, string $error): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage($error);
        StatFactory::create($data);
    }

    /**
     * @dataProvider baseDamageDataProvider
     * @param DrawingInterface $drawing
     * @param MaterialInterface $material
     * @param StatInterface $expectedStat
     * @throws ItemException
     */
    public function testStatFactoryBaseDamageSuccess(
        DrawingInterface $drawing,
        MaterialInterface $material,
        StatInterface $expectedStat
    ): void
    {
        self::assertEquals($expectedStat, StatFactory::baseDamage($drawing, $material));
    }

    /**
     * @dataProvider baseResistDataProvider
     * @param DrawingInterface $drawing
     * @param MaterialInterface $material
     * @param StatInterface|null $expectedStat
     * @throws ItemException
     */
    public function testStatFactoryBaseResistSuccess(
        DrawingInterface $drawing,
        MaterialInterface $material,
        ?StatInterface $expectedStat
    ): void
    {
        self::assertEquals($expectedStat, StatFactory::baseResist($drawing, $material));
    }

    public function testStatFactoryBaseResistNoArmorType(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(StatException::MISS_ARMOR_TYPE);
        StatFactory::baseResist(Crossbow::get(1001), Metal::get('iron'));
    }

    public function testStatFactoryBaseResistMissSection(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(StatException::MISS_SECTION_TYPE);
        StatFactory::baseResist($this->getDrawingMissSection(), Metal::get('iron'));
    }

    /**
     * @dataProvider baseMagicDefenseDataProvider
     * @param DrawingInterface $drawing
     * @param StatInterface|null $expectedStat
     * @throws ItemException
     */
    public function testStatFactoryBaseMagicDefense(DrawingInterface $drawing, ?StatInterface $expectedStat): void
    {
        self::assertEquals($expectedStat, StatFactory::baseMagicDefense($drawing));
    }

    public function testStatFactoryBaseMagicDefenseNoArmorType(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(StatException::MISS_ARMOR_TYPE);
        StatFactory::baseMagicDefense(Crossbow::get(1001));
    }

    public function testStatFactoryBaseMagicDefenseMissSection(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(StatException::MISS_SECTION_TYPE);
        StatFactory::baseMagicDefense($this->getDrawingMissSection());
    }

    /**
     * @dataProvider baseDefenseDataProvider
     * @param DrawingInterface $drawing
     * @param StatInterface|null $expectedStat
     * @throws ItemException
     */
    public function testStatFactoryBaseDefenseSuccess(DrawingInterface $drawing, ?StatInterface $expectedStat): void
    {
        self::assertEquals($expectedStat, StatFactory::baseDefense($drawing));
    }

    public function testStatFactoryBaseDefenseNoArmorType(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(StatException::MISS_ARMOR_TYPE);
        StatFactory::baseDefense(Crossbow::get(1001));
    }

    public function testStatFactoryBaseDefenseMissSection(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(StatException::MISS_SECTION_TYPE);
        StatFactory::baseDefense($this->getDrawingMissSection());
    }

    /**
     * @dataProvider baseManaDataProvider
     * @param DrawingInterface $drawing
     * @param StatInterface|null $expectedStat
     * @throws ItemException
     */
    public function testStatFactoryBaseManaSuccess(DrawingInterface $drawing, ?StatInterface $expectedStat): void
    {
        self::assertEquals($expectedStat, StatFactory::baseMana($drawing));
    }

    public function testStatFactoryBaseManaNoArmorType(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(StatException::MISS_ARMOR_TYPE);
        StatFactory::baseMana(Crossbow::get(1001));
    }

    public function testStatFactoryBaseManaMissSection(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(StatException::MISS_SECTION_TYPE);
        StatFactory::baseMana($this->getDrawingMissSection());
    }

    /**
     * @throws ItemException
     */
    public function testStatFactoryBaseDamageInvalidDrawing(): void
    {
        $drawing = DrawingFactory::create([
            'id'               => 1001,
            'name'             => 'Light Crossbow',
            'icon'             => '/img/icon/items/crossbow/01.png',
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
            'weight'           => 150,
            'min_level'        => 1,
            'strength'         => 0.6,
            'intelligence'     => 0.0,
            'dexterity'        => 0.6,
            'affix_exception'  => [],
            'stats'            => [
                [
                    'name'    => 'offense.criticalChance',
                    'value'   => 10,
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
            ],
        ]);

        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(StatException::MISS_WEAPON_SPEED);
        StatFactory::baseDamage($drawing, Metal::get('iron'));
    }

    /**
     * @throws ItemException
     */
    public function testStatFactoryBaseDamageZeroCritical(): void
    {
        $drawing = DrawingFactory::create([
            'id'               => 1001,
            'name'             => 'Light Crossbow',
            'icon'             => '/img/icon/items/crossbow/01.png',
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
            'weight'           => 130,
            'min_level'        => 1,
            'strength'         => 0.6,
            'intelligence'     => 0.0,
            'dexterity'        => 0.6,
            'affix_exception'  => [],
            'stats'            => [
                [
                    'name'    => 'offense.attackSpeed',
                    'value'   => 100,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '',
                ],
            ],
        ]);

        self::assertEquals(17, StatFactory::baseDamage($drawing, Metal::get('iron'))->getValue());
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                [
                    'name'    => 'offense.criticalChance',
                    'value'   => 10,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
            ],
            [
                [
                    'name'    => 'offense.attackSpeed',
                    'value'   => 120,
                    'quality' => true,
                    'prefix'  => '+',
                    'suffix'  => '',
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
            // miss name
            [
                [
                    'value'   => 10,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                StatException::INVALID_NAME,
            ],
            // name invalid type
            [
                [
                    'name'    => null,
                    'value'   => 10,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                StatException::INVALID_NAME,
            ],
            // name invalid value
            [
                [
                    'name'    => 'name',
                    'value'   => 10,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                StatException::INVALID_NAME,
            ],
            // miss value
            [
                [
                    'name'    => 'offense.attackSpeed',
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                StatException::INVALID_VALUE,
            ],
            // value invalid type
            [
                [
                    'name'    => 'offense.attackSpeed',
                    'value'   => '10.5',
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                StatException::INVALID_VALUE,
            ],
            // miss quality
            [
                [
                    'name'   => 'offense.attackSpeed',
                    'value'  => 10,
                    'prefix'  => '',
                    'suffix' => '%',
                ],
                StatException::INVALID_QUALITY,
            ],
            // quality invalid type
            [
                [
                    'name'    => 'offense.attackSpeed',
                    'value'   => 10,
                    'quality' => 1,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                StatException::INVALID_QUALITY,
            ],
            // miss prefix
            [
                [
                    'name'    => 'offense.attackSpeed',
                    'value'   => 120,
                    'quality' => true,
                    'suffix'  => '',
                ],
                StatException::INVALID_PREFIX,
            ],
            // prefix invalid type
            [
                [
                    'name'    => 'offense.attackSpeed',
                    'value'   => 120,
                    'quality' => true,
                    'prefix'  => 123,
                    'suffix'  => '',
                ],
                StatException::INVALID_PREFIX,
            ],
            // miss suffix
            [
                [
                    'name'    => 'offense.attackSpeed',
                    'value'   => 10,
                    'quality' => true,
                    'prefix'  => '',
                ],
                StatException::INVALID_SUFFIX,
            ],
            // suffix invalid type
            [
                [
                    'name'    => 'offense.attackSpeed',
                    'value'   => 10,
                    'quality' => true,
                    'suffix'  => [],
                    'prefix'  => '',
                ],
                StatException::INVALID_SUFFIX,
            ],
        ];
    }

    /**
     * @return array
     * @throws ItemException
     */
    public function baseDamageDataProvider(): array
    {
        return [
            [
                Crossbow::get(1001),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'offense.physicalDamage',
                    'value'   => 15,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Crossbow::get(1001),
                Metal::get('gold'),
                StatFactory::create([
                    'name'    => 'offense.fireDamage',
                    'value'   => 15,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Crossbow::get(1001),
                Metal::get('agatyp'),
                StatFactory::create([
                    'name'    => 'offense.waterDamage',
                    'value'   => 15,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Crossbow::get(1001),
                Metal::get('white_metal'),
                StatFactory::create([
                    'name'    => 'offense.airDamage',
                    'value'   => 15,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Crossbow::get(1001),
                Metal::get('miteril'),
                StatFactory::create([
                    'name'    => 'offense.earthDamage',
                    'value'   => 15,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Crossbow::get(1001),
                Metal::get('silver'),
                StatFactory::create([
                    'name'    => 'offense.lifeDamage',
                    'value'   => 15,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Crossbow::get(1001),
                Metal::get('doom_metal'),
                StatFactory::create([
                    'name'    => 'offense.deathDamage',
                    'value'   => 15,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Sword::get(1201),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'offense.physicalDamage',
                    'value'   => 10,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
        ];
    }

    /**
     * @return array[]
     * @throws ItemException
     */
    public function baseResistDataProvider(): array
    {
        return [
            [
                Armor::get(5001),
                Fabric::get('ajura_fabric'),
                null,
            ],
            [
                Armor::get(5031),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 21,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Shield::get(5601),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 20,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Armor::get(5011),
                Leather::get('hyena_leather'),
                StatFactory::create([
                    'name'    => 'defense.fireResist',
                    'value'   => 5,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Armor::get(5021),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 10,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Armor::get(5036),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 44,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Armor::get(5036),
                Metal::get('silver'),
                StatFactory::create([
                    'name'    => 'defense.lifeResist',
                    'value'   => 44,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Armor::get(5036),
                Metal::get('gold'),
                StatFactory::create([
                    'name'    => 'defense.fireResist',
                    'value'   => 44,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Armor::get(5036),
                Metal::get('agatyp'),
                StatFactory::create([
                    'name'    => 'defense.waterResist',
                    'value'   => 44,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Armor::get(5036),
                Metal::get('white_metal'),
                StatFactory::create([
                    'name'    => 'defense.airResist',
                    'value'   => 44,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Armor::get(5036),
                Metal::get('miteril'),
                StatFactory::create([
                    'name'    => 'defense.earthResist',
                    'value'   => 44,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Armor::get(5036),
                Metal::get('doom_metal'),
                StatFactory::create([
                    'name'    => 'defense.deathResist',
                    'value'   => 44,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            // helmet
            [
                Helmet::get(5101),
                Metal::get('iron'),
                null,
            ],
            [
                Helmet::get(5111),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 3,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Helmet::get(5121),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 7,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Helmet::get(5131),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 11,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            // legs
            [
                Legs::get(5401),
                Metal::get('iron'),
                null,
            ],
            [
                Legs::get(5411),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 4,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Legs::get(5421),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 6,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Legs::get(5431),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 10,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            // boots
            [
                Boots::get(5301),
                Metal::get('iron'),
                null,
            ],
            [
                Boots::get(5311),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 3,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Boots::get(5321),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 5,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Boots::get(5331),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 9,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            // gloves
            [
                Gloves::get(5201),
                Metal::get('iron'),
                null,
            ],
            [
                Gloves::get(5211),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 3,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Gloves::get(5221),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 5,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Gloves::get(5231),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 9,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            // shoulders
            [
                Shoulders::get(5501),
                Metal::get('iron'),
                null,
            ],
            [
                Shoulders::get(5511),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 4,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Shoulders::get(5521),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 7,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            [
                Shoulders::get(5531),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 11,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            // ring
            [
                Ring::get(5701),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 5,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
            // amulet
            [
                Amulet::get(5801),
                Metal::get('iron'),
                StatFactory::create([
                    'name'    => 'defense.physicalResist',
                    'value'   => 9,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ]),
            ],
        ];
    }

    /**
     * @return array
     * @throws ItemException
     */
    public function baseMagicDefenseDataProvider(): array
    {
        return [
            [
                Ring::get(5701),
                StatFactory::create([
                    'name'    => 'defense.magicDefense',
                    'value'   => 45,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Ring::get(5706),
                StatFactory::create([
                    'name'    => 'defense.magicDefense',
                    'value'   => 375,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Amulet::get(5806),
                StatFactory::create([
                    'name'    => 'defense.magicDefense',
                    'value'   => 603,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Armor::get(5001),
                StatFactory::create([
                    'name'    => 'defense.magicDefense',
                    'value'   => 40,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Armor::get(5036),
                StatFactory::create([
                    'name'    => 'defense.magicDefense',
                    'value'   => -494,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Helmet::get(5101),
                StatFactory::create([
                    'name'    => 'defense.magicDefense',
                    'value'   => 24,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Legs::get(5401),
                StatFactory::create([
                    'name'    => 'defense.magicDefense',
                    'value'   => 20,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Shoulders::get(5501),
                StatFactory::create([
                    'name'    => 'defense.magicDefense',
                    'value'   => 18,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Gloves::get(5201),
                StatFactory::create([
                    'name'    => 'defense.magicDefense',
                    'value'   => 16,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Boots::get(5301),
                StatFactory::create([
                    'name'    => 'defense.magicDefense',
                    'value'   => 16,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Shield::get(5606),
                StatFactory::create([
                    'name'    => 'defense.magicDefense',
                    'value'   => -986,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Helmet::get(5136),
                StatFactory::create([
                    'name'    => 'defense.magicDefense',
                    'value'   => -387,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Shoulders::get(5536),
                StatFactory::create([
                    'name'    => 'defense.magicDefense',
                    'value'   => -381,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Gloves::get(5236),
                StatFactory::create([
                    'name'    => 'defense.magicDefense',
                    'value'   => -379,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Legs::get(5436),
                StatFactory::create([
                    'name'    => 'defense.magicDefense',
                    'value'   => -383,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Armor::get(5011),
                null,
            ],
        ];
    }

    /**
     * @return array
     * @throws ItemException
     */
    public function baseDefenseDataProvider(): array
    {
        return [
            // light
            [
                Armor::get(5011),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => 42,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Helmet::get(5111),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => 26,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Legs::get(5411),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => 22,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Shoulders::get(5511),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => 20,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Gloves::get(5211),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => 18,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Boots::get(5311),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => 18,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            // middle
            [
                Armor::get(5021),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => 16,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Helmet::get(5121),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => 9,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Legs::get(5421),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => 7,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Shoulders::get(5521),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => 6,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Gloves::get(5221),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => 5,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Boots::get(5321),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => 5,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            // heavy
            [
                Armor::get(5031),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => -42,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Helmet::get(5131),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => -26,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Legs::get(5431),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => -22,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Shoulders::get(5531),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => -20,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Gloves::get(5231),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => -18,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Boots::get(5331),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => -18,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Shield::get(5606),
                StatFactory::create([
                    'name'    => 'defense.defense',
                    'value'   => -986,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '',
                ]),
            ],
            [
                Armor::get(5001),
                null,
            ],
        ];
    }

    /**
     * @return array
     * @throws ItemException
     */
    public function baseManaDataProvider(): array
    {
        return [
            [
                Armor::get(5001),
                StatFactory::create([
                    'name'    => 'base.mana',
                    'value'   => 16,
                    'quality' => true,
                    'prefix'  => '+',
                    'suffix'  => '',
                ]),
            ],
            [
                Armor::get(5006),
                StatFactory::create([
                    'name'    => 'base.mana',
                    'value'   => 100,
                    'quality' => true,
                    'prefix'  => '+',
                    'suffix'  => '',
                ]),
            ],
            [
                Helmet::get(5106),
                StatFactory::create([
                    'name'    => 'base.mana',
                    'value'   => 70,
                    'quality' => true,
                    'prefix'  => '+',
                    'suffix'  => '',
                ]),
            ],
            [
                Legs::get(5406),
                StatFactory::create([
                    'name'    => 'base.mana',
                    'value'   => 60,
                    'quality' => true,
                    'prefix'  => '+',
                    'suffix'  => '',
                ]),
            ],
            [
                Shoulders::get(5506),
                StatFactory::create([
                    'name'    => 'base.mana',
                    'value'   => 50,
                    'quality' => true,
                    'prefix'  => '+',
                    'suffix'  => '',
                ]),
            ],
            [
                Gloves::get(5206),
                StatFactory::create([
                    'name'    => 'base.mana',
                    'value'   => 40,
                    'quality' => true,
                    'prefix'  => '+',
                    'suffix'  => '',
                ]),
            ],
            [
                Boots::get(5306),
                StatFactory::create([
                    'name'    => 'base.mana',
                    'value'   => 40,
                    'quality' => true,
                    'prefix'  => '+',
                    'suffix'  => '',
                ]),
            ],
            [
                Armor::get(5036),
                null,
            ],
        ];
    }

    /**
     * @return DrawingInterface
     */
    private function getDrawingMissSection(): DrawingInterface
    {
        return new Drawing(
            123,
            'invalid item',
            'icon',
            100,
            50,
            1,
            1.0,
            0.0,
            0.0,
            [],
            new StatCollection(),
            new ItemType(ItemTypeInterface::EQUIP),
            new EquipType(EquipTypeInterface::TWO_HAND),
            null,
            null,
            null,
            new ArmorType(ArmorTypeInterface::HEAVY),
            null,
            null,
            new GenderType(GenderTypeInterface::MALE),
            new MagicType(MagicTypeInterface::TWO_HAND_WEAPON)
        );
    }
}
