<?php

declare(strict_types=1);

namespace Tests\Item\Generator;

use Exception;
use Item\Affix\Type\AffixTypeInterface;
use Item\Base\Base;
use Item\Base\BaseInterface;
use Item\Defense\Defense;
use Item\Defense\DefenseInterface;
use Item\Drawing\DataProvider\Armor;
use Item\Drawing\DataProvider\Crossbow;
use Item\Drawing\DataProvider\Dagger;
use Item\Drawing\DataProvider\Ring;
use Item\Drawing\DataProvider\Staff;
use Item\Drawing\Drawing;
use Item\Drawing\DrawingFactory;
use Item\Drawing\DrawingInterface;
use Item\Drawing\Stat\StatCollection;
use Item\Generator\Generator;
use Item\ItemException;
use Item\ItemInterface;
use Item\Material\DataProvider\Fabric;
use Item\Material\DataProvider\Leather;
use Item\Material\DataProvider\Metal;
use Item\Material\DataProvider\Wood;
use Item\Material\MaterialException;
use Item\Material\MaterialInterface;
use Item\Offense\Offense;
use Item\Offense\OffenseInterface;
use Item\Translator\TranslatorRU;
use Item\Type\Damage\DamageType;
use Item\Type\Damage\DamageTypeInterface;
use Item\Type\Equip\EquipTypeInterface;
use Item\Type\Gender\GenderType;
use Item\Type\Gender\GenderTypeInterface;
use Item\Type\ItemType;
use Item\Type\ItemTypeInterface;
use Item\Type\Magic\MagicTypeInterface;
use Item\Type\MagicQuality\MagicQuality;
use Item\Type\MagicQuality\MagicQualityInterface;
use Item\Type\Material\MaterialTypeInterface;
use Item\Type\Potion\PotionTypeInterface;
use Item\Type\Quality\Quality;
use Item\Type\Quality\QualityInterface;
use Item\Type\Section\SectionTypeInterface;
use Item\Type\Weapon\WeaponType;
use Item\Type\Weapon\WeaponTypeInterface;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class GeneratorTest extends TestCase
{
    /**
     * @dataProvider generatorCommonItemDataProvider
     * @param DrawingInterface $drawing
     * @param MaterialInterface $material
     * @param QualityInterface $quality
     * @param MagicQualityInterface $magicQuality
     * @param int $itemLevel
     * @param string $inventoryId
     * @param string $expectedName
     * @param int $expectedPrice
     * @param int $expectedMinStrength
     * @param int $expectedMinDexterity
     * @param int $expectedMinIntelligence
     * @param string $expectedPropertyInfo
     * @param string $expectedDescription
     * @param BaseInterface $expectedBase
     * @param OffenseInterface $expectedOffense
     * @param DefenseInterface $expectedDefense
     * @throws Exception
     */
    public function testGeneratorEquipCommonItem(
        DrawingInterface $drawing,
        MaterialInterface $material,
        QualityInterface $quality,
        MagicQualityInterface $magicQuality,
        int $itemLevel,
        string $inventoryId,
        string $expectedName,
        int $expectedPrice,
        int $expectedMinStrength,
        int $expectedMinDexterity,
        int $expectedMinIntelligence,
        string $expectedPropertyInfo,
        string $expectedDescription,
        BaseInterface $expectedBase,
        OffenseInterface $expectedOffense,
        DefenseInterface $expectedDefense
    ): void
    {
        $translator = new TranslatorRU();
        $item = Generator::equip($drawing, $material, $quality, $magicQuality, $itemLevel, $inventoryId);

        self::assertTrue(Uuid::isValid($item->getId()));
        self::assertEquals($drawing->getId(), $item->getDbId());
        self::assertEquals($itemLevel, $item->getItemLevel());
        self::assertEquals($inventoryId, $item->getInventoryId());
        self::assertEquals($expectedName, $item->getName($translator));
        self::assertEquals($drawing->getIcon(), $item->getIcon());
        self::assertEquals($expectedPrice, $item->getPrice());
        self::assertEquals($drawing->getMinLevel(), $item->getMinLevel());
        self::assertEquals($expectedMinStrength, $item->getMinStrength());
        self::assertEquals($expectedMinDexterity, $item->getMinDexterity());
        self::assertEquals($expectedMinIntelligence, $item->getMinIntelligence());
        self::assertEquals($expectedPropertyInfo, $item->getPropertyInfo());
        self::assertEquals($expectedDescription, $item->getDescription($translator, 100, 100, 100));
        self::assertEquals('', $item->getMagicPropertyInfo());
        self::assertEquals('', $item->getMagicDescription($translator));
        self::assertEquals($drawing->getType(), $item->getType());
        self::assertEquals($magicQuality, $item->getMagicQuality());
        self::assertEquals($expectedBase, $item->getBase());
        self::assertEquals($expectedOffense, $item->getOffense());
        self::assertEquals($expectedDefense, $item->getDefense());
        self::assertEquals($drawing->getEquipType(), $item->getEquipType());
        self::assertEquals($drawing->getSectionType(), $item->getSectionType());
        self::assertEquals($drawing->getArmorType(), $item->getArmorType());
        self::assertEquals($drawing->getPotionType(), $item->getPotionType());
        self::assertEquals($drawing->getMagicType(), $item->getMagicType());
    }

    /**
     * @dataProvider generatorRelicItemDataProvider
     * @param DrawingInterface $drawing
     * @param MaterialInterface $material
     * @param int $itemLevel
     * @param string $inventoryId
     * @param string $expectedName
     * @throws Exception
     */
    public function testGeneratorEquipRelicItem(
        DrawingInterface $drawing,
        MaterialInterface $material,
        int $itemLevel,
        string $inventoryId,
        string $expectedName
    ): void
    {
        $quality = new Quality(QualityInterface::NORMAL, $drawing->getGenderType());
        $magicQuality = new MagicQuality(MagicQualityInterface::RELIC);
        $item = Generator::equip($drawing, $material, $quality, $magicQuality, $itemLevel, $inventoryId);

        self::assertEquals($expectedName, $item->getName(new TranslatorRU()));
    }

    /**
     * @throws Exception
     */
    public function testGeneratorEquipInvalidItemType(): void
    {
        $drawing = DrawingFactory::create([
            'id'               => 157,
            'name'             => 'Book',
            'icon'             => 'book.png',
            'price'            => 100,
            'weight'           => 10,
            'min_level'        => 1,
            'strength'         => 0.0,
            'dexterity'        => 0.0,
            'intelligence'     => 0.0,
            'affix_exception'  => [],
            'type_id'          => ItemTypeInterface::BOOK,
            'equip_type_id'    => null,
            'section_type_id'  => null,
            'weapon_type_id'   => null,
            'armor_type_id'    => null,
            'potion_type_id'   => null,
            'material_type_id' => null,
            'gender_type_id'   => GenderTypeInterface::MALE,
            'magic_type_id'    => null,
            'stats'            => [],
        ]);

        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::EQUIP_TYPE_ONLY);
        Generator::equip(
            $drawing,
            Metal::get('iron'),
            new Quality(QualityInterface::NORMAL, $drawing->getGenderType()),
            new MagicQuality(MagicQualityInterface::COMMON),
            15,
            '',
        );
    }

    /**
     * @dataProvider addAffixExceptionsDataProvider
     * @param MaterialInterface $material
     * @param array $expectedExceptions
     * @throws ItemException
     */
    public function testGeneratorAddAffixExceptions(MaterialInterface $material, array $expectedExceptions): void
    {
        $drawing = Crossbow::get(1001);

        Generator::addAffixExceptions($drawing, $material);

        self::assertEquals($expectedExceptions, $drawing->getAffixException());
    }

    /**
     * @throws Exception
     */
    public function testGeneratorEquipMissGenderType(): void
    {
        $drawing = new Drawing(
            43,
            'invalid item',
            'icon',
            100,
            16,
            5,
            0,
            0,
            0,
            [],
            new StatCollection(),
            new ItemType(ItemTypeInterface::EQUIP),
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
        );

        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::EQUIP_MISS_GENDER);
        Generator::equip(
            $drawing,
            Metal::get('iron'),
            new Quality(QualityInterface::NORMAL, new GenderType(GenderTypeInterface::MALE)),
            new MagicQuality(MagicQualityInterface::COMMON),
            15,
            '',
        );
    }

    /**
     * @throws Exception
     */
    public function testGeneratorGetRandom(): void
    {
        self::assertInstanceOf(ItemInterface::class, Generator::random(30, 0, 1, ''));
    }

    /**
     * @throws ItemException
     */
    public function testGeneratorGetMaterialSuccess(): void
    {
        self::assertEquals(MaterialTypeInterface::CLOTH, Generator::getMaterial(Armor::get(5001), 1)->getType()->getId());
        self::assertEquals(MaterialTypeInterface::LEATHER, Generator::getMaterial(Armor::get(5011), 1)->getType()->getId());
        self::assertEquals(MaterialTypeInterface::METAL, Generator::getMaterial(Armor::get(5021), 1)->getType()->getId());
        self::assertEquals(MaterialTypeInterface::WOOD, Generator::getMaterial(Staff::get(1101), 1)->getType()->getId());
    }

    /**
     * @throws ItemException
     */
    public function testGeneratorGetMaterialFail(): void
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
            'stats'            => [],
        ]);

        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(MaterialException::EXPECTED_EQUIP);
        Generator::getMaterial($drawing, 1);
    }

    /**
     * @return array
     * @throws ItemException
     */
    public function generatorCommonItemDataProvider(): array
    {
        $base1 = new Base(160);
        $base2 = new Base(250);
        $base3 = new Base(248);
        $base4 = new Base(192);
        $base5 = new Base(37);

        $base5->addMana(24);

        $offense1 = new Offense(new WeaponType(WeaponTypeInterface::SWORD), new DamageType(DamageTypeInterface::ATTACK));
        $offense1->addPhysicalDamage(20);
        $offense1->addCriticalChance(10);
        $offense1->addCriticalMultiplier(200);
        $offense1->addAttackSpeed(100);

        $offense2 = new Offense(new WeaponType(WeaponTypeInterface::STAFF), new DamageType(DamageTypeInterface::SPELL));
        $offense2->addFireDamage(58);
        $offense2->addCriticalChance(15);
        $offense2->addCriticalMultiplier(150);
        $offense2->addCastSpeed(120);

        $offense3 = new Offense(new WeaponType(WeaponTypeInterface::SWORD), new DamageType(DamageTypeInterface::ATTACK));
        $offense3->addFireDamage(31);
        $offense3->addCriticalChance(10);
        $offense3->addCriticalMultiplier(200);
        $offense3->addAttackSpeed(100);

        $offense4 = new Offense(new WeaponType(WeaponTypeInterface::SWORD), new DamageType(DamageTypeInterface::ATTACK));
        $offense4->addPhysicalDamage(24);
        $offense4->addCriticalChance(10);
        $offense4->addCriticalMultiplier(200);
        $offense4->addAttackSpeed(100);

        $offense5 = new Offense(new WeaponType(WeaponTypeInterface::DAGGER), new DamageType(DamageTypeInterface::ATTACK));
        $offense5->addPhysicalDamage(10);
        $offense5->addAttackSpeed(120);
        $offense5->addCriticalChance(16);
        $offense5->addCriticalMultiplier(200);
        $offense5->addCriticalBleeding(1);

        $defense1 = new Defense();
        $defense2 = new Defense();
        $defense3 = new Defense();
        $defense5 = new Defense();

        $defense1->addPhysicalResist(52);
        $defense1->addDefense(-592);
        $defense1->addMagicDefense(-592);

        $defense2->addPhysicalResist(14);
        $defense2->addMagicDefense(450);

        $defense3->addDefense(489);
        $defense3->addFireResist(12);

        $defense5->addMagicDefense(60);

        return [
            // material quality = 1.0
            [
                DrawingFactory::create([
                    'id'               => 143,
                    'name'             => 'Short Sword',
                    'icon'             => 'sword.png',
                    'price'            => 1000,
                    'weight'           => 160,
                    'min_level'        => 4,
                    'strength'         => 0.7,
                    'dexterity'        => 0.5,
                    'intelligence'     => 0.0,
                    'affix_exception'  => [],
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::ONE_HAND,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                    'gender_type_id'   => GenderTypeInterface::MALE,
                    'magic_type_id'    => MagicTypeInterface::ONE_HAND_WEAPON,
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
                        [
                            'name'    => 'offense.attackSpeed',
                            'value'   => 100,
                            'quality' => false,
                            'prefix'  => '',
                            'suffix'  => '',
                        ],
                    ],
                ]),
                Metal::get('iron'),
                new Quality(QualityInterface::NORMAL, new GenderType(GenderTypeInterface::MALE)),
                new MagicQuality(MagicQualityInterface::COMMON),
                10,
                '3b7ebe4f-01fb-4151-9fdc-35be3e2e78c8',
                'Железный Короткий Меч',
                1000,
                18,
                13,
                0,
                'offense.physicalDamage#20|offense.criticalChance#10%|offense.criticalMultiplier#200%|offense.attackSpeed#100',
                '<div class="item_d_pl"><p>Физический урон</p></div><div class="item_d_pr"><p>20</p></div><div class="item_d_pl"><p>Шанс критического удара</p></div><div class="item_d_pr"><p>10%</p></div><div class="item_d_pl"><p>Сила критического удара</p></div><div class="item_d_pr"><p>200%</p></div><div class="item_d_pl"><p>Скорость атаки</p></div><div class="item_d_pr"><p>1</p></div><div class="item_d_pl"><p>Необходимо силы</p></div><div class="item_d_pr"><p>18</p></div><div class="item_d_pl"><p>Необходимо ловкости</p></div><div class="item_d_pr"><p>13</p></div>',
                $base1,
                $offense1,
                new Defense(),
            ],
            // material quality = 1.0
            [
                DrawingFactory::create([
                    'id'               => 48,
                    'name'             => 'Staff',
                    'icon'             => 'staff.png',
                    'price'            => 2500,
                    'weight'           => 250,
                    'min_level'        => 12,
                    'strength'         => 0.0,
                    'dexterity'        => 0.0,
                    'intelligence'     => 1.0,
                    'affix_exception'  => [],
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::TWO_HAND,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::STAFF,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                    'gender_type_id'   => GenderTypeInterface::MALE,
                    'magic_type_id'    => MagicTypeInterface::TWO_HAND_WEAPON,
                    'stats'            => [
                        [
                            'name'    => 'offense.criticalChance',
                            'value'   => 15,
                            'quality' => false,
                            'prefix'  => '',
                            'suffix'  => '%',
                        ],
                        [
                            'name'    => 'offense.criticalMultiplier',
                            'value'   => 150,
                            'quality' => false,
                            'prefix'  => '',
                            'suffix'  => '%',
                        ],
                        [
                            'name'    => 'offense.castSpeed',
                            'value'   => 120,
                            'quality' => false,
                            'prefix'  => '',
                            'suffix'  => '',
                        ],
                    ],
                ]),
                Wood::get('mahogany'),
                new Quality(QualityInterface::NORMAL, new GenderType(GenderTypeInterface::MALE)),
                new MagicQuality(MagicQualityInterface::COMMON),
                24,
                '4e3b0264-55c1-46cc-9627-97bed4d26205',
                'Посох из Красного дерева',
                2500,
                0,
                0,
                51,
                'offense.fireDamage#58|offense.criticalChance#15%|offense.criticalMultiplier#150%|offense.castSpeed#120',
                '<div class="item_d_pl"><p>Урон огнем</p></div><div class="item_d_pr"><p>58</p></div><div class="item_d_pl"><p>Шанс критического удара</p></div><div class="item_d_pr"><p>15%</p></div><div class="item_d_pl"><p>Сила критического удара</p></div><div class="item_d_pr"><p>150%</p></div><div class="item_d_pl"><p>Скорость создания заклинаний</p></div><div class="item_d_pr"><p>1.2</p></div><div class="item_d_pl"><p>Необходимо интеллекта</p></div><div class="item_d_pr"><p>51</p></div>',
                $base2,
                $offense2,
                new Defense(),
            ],
            // material quality = 1.55
            [
                DrawingFactory::create([
                    'id'               => 143,
                    'name'             => 'Short Sword',
                    'icon'             => 'sword.png',
                    'price'            => 1000,
                    'weight'           => 160,
                    'min_level'        => 4,
                    'strength'         => 0.7,
                    'dexterity'        => 0.5,
                    'intelligence'     => 0.0,
                    'affix_exception'  => [],
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::ONE_HAND,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                    'gender_type_id'   => GenderTypeInterface::MALE,
                    'magic_type_id'    => MagicTypeInterface::ONE_HAND_WEAPON,
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
                        [
                            'name'    => 'offense.attackSpeed',
                            'value'   => 100,
                            'quality' => false,
                            'prefix'  => '',
                            'suffix'  => '',
                        ],
                    ],
                ]),
                Metal::get('meteorite'),
                new Quality(QualityInterface::NORMAL, new GenderType(GenderTypeInterface::MALE)),
                new MagicQuality(MagicQualityInterface::COMMON),
                10,
                '3b7ebe4f-01fb-4151-9fdc-35be3e2e78c8',
                'Метеоритовый Короткий Меч',
                1550,
                29,
                20,
                0,
                'offense.fireDamage#31|offense.criticalChance#10%|offense.criticalMultiplier#200%|offense.attackSpeed#100',
                '<div class="item_d_pl"><p>Урон огнем</p></div><div class="item_d_pr"><p>31</p></div><div class="item_d_pl"><p>Шанс критического удара</p></div><div class="item_d_pr"><p>10%</p></div><div class="item_d_pl"><p>Сила критического удара</p></div><div class="item_d_pr"><p>200%</p></div><div class="item_d_pl"><p>Скорость атаки</p></div><div class="item_d_pr"><p>1</p></div><div class="item_d_pl"><p>Необходимо силы</p></div><div class="item_d_pr"><p>29</p></div><div class="item_d_pl"><p>Необходимо ловкости</p></div><div class="item_d_pr"><p>20</p></div>',
                $base3,
                $offense3,
                new Defense(),
            ],
            // material quality = 1.0 and quality = 1.2
            [
                DrawingFactory::create([
                    'id'               => 143,
                    'name'             => 'Short Sword',
                    'icon'             => 'sword.png',
                    'price'            => 1000,
                    'weight'           => 160,
                    'min_level'        => 4,
                    'strength'         => 0.7,
                    'dexterity'        => 0.5,
                    'intelligence'     => 0.0,
                    'affix_exception'  => [],
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::ONE_HAND,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                    'gender_type_id'   => GenderTypeInterface::MALE,
                    'magic_type_id'    => MagicTypeInterface::ONE_HAND_WEAPON,
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
                        [
                            'name'    => 'offense.attackSpeed',
                            'value'   => 100,
                            'quality' => false,
                            'prefix'  => '',
                            'suffix'  => '',
                        ],
                    ],
                ]),
                Metal::get('iron'),
                new Quality(QualityInterface::EXCELLENT, new GenderType(GenderTypeInterface::MALE)),
                new MagicQuality(MagicQualityInterface::COMMON),
                10,
                '3b7ebe4f-01fb-4151-9fdc-35be3e2e78c8',
                'Превосходный Железный Короткий Меч',
                1200,
                18,
                13,
                0,
                'offense.physicalDamage#24|offense.criticalChance#10%|offense.criticalMultiplier#200%|offense.attackSpeed#100',
                '<div class="item_d_pl"><p>Физический урон</p></div><div class="item_d_pr"><p>24</p></div><div class="item_d_pl"><p>Шанс критического удара</p></div><div class="item_d_pr"><p>10%</p></div><div class="item_d_pl"><p>Сила критического удара</p></div><div class="item_d_pr"><p>200%</p></div><div class="item_d_pl"><p>Скорость атаки</p></div><div class="item_d_pr"><p>1</p></div><div class="item_d_pl"><p>Необходимо силы</p></div><div class="item_d_pr"><p>18</p></div><div class="item_d_pl"><p>Необходимо ловкости</p></div><div class="item_d_pr"><p>13</p></div>',
                $base4,
                $offense4,
                new Defense(),
            ],
            // armor
            [
                Armor::get(5036),
                Metal::get('iron'),
                new Quality(QualityInterface::EXCELLENT, new GenderType(GenderTypeInterface::MALE)),
                new MagicQuality(MagicQualityInterface::COMMON),
                10,
                '3b7ebe4f-01fb-4151-9fdc-35be3e2e78c8',
                'Превосходный Железный Латный Доспех',
                3908,
                81,
                0,
                0,
                'defense.defense#-592|defense.magicDefense#-592|defense.physicalResist#52%',
                '<div class="item_d_pl"><p>Защита</p></div><div class="item_d_pr"><p>-592</p></div><div class="item_d_pl"><p>Магическая защита</p></div><div class="item_d_pr"><p>-592</p></div><div class="item_d_pl"><p>Сопротивление физическому урону</p></div><div class="item_d_pr"><p>52%</p></div><div class="item_d_pl"><p>Необходимо силы</p></div><div class="item_d_pr"><p>81</p></div>',
                new Base(288),
                new Offense(),
                $defense1,
            ],
            // ring
            [
                Ring::get(5706),
                Metal::get('iron'),
                new Quality(QualityInterface::EXCELLENT, new GenderType(GenderTypeInterface::AVERAGE)),
                new MagicQuality(MagicQualityInterface::COMMON),
                10,
                '3b7ebe4f-01fb-4151-9fdc-35be3e2e78c8',
                'Превосходное Железное Кольцо Мудрости',
                2798,
                0,
                0,
                0,
                'defense.magicDefense#450|defense.physicalResist#14%',
                '<div class="item_d_pl"><p>Магическая защита</p></div><div class="item_d_pr"><p>450</p></div><div class="item_d_pl"><p>Сопротивление физическому урону</p></div><div class="item_d_pr"><p>14%</p></div>',
                new Base(9),
                new Offense(),
                $defense2,
            ],
            // armor
            [
                Armor::get(5015),
                Leather::get('hyena_leather'),
                new Quality(QualityInterface::EXCELLENT, new GenderType(GenderTypeInterface::MALE)),
                new MagicQuality(MagicQualityInterface::COMMON),
                10,
                '3b7ebe4f-01fb-4151-9fdc-35be3e2e78c8',
                'Превосходный  Проклепанный Нагрудник из кожи гиены',
                2286,
                0,
                69,
                0,
                'defense.defense#489|defense.fireResist#12%',
                '<div class="item_d_pl"><p>Защита</p></div><div class="item_d_pr"><p>489</p></div><div class="item_d_pl"><p>Сопротивление урону огнем</p></div><div class="item_d_pr"><p>12%</p></div><div class="item_d_pl"><p>Необходимо ловкости</p></div><div class="item_d_pr"><p>69</p></div>',
                new Base(108),
                new Offense(),
                $defense3,
            ],
            // dagger
            [
                Dagger::get(1351),
                Metal::get('iron'),
                new Quality(QualityInterface::EXCELLENT, new GenderType(GenderTypeInterface::MALE)),
                new MagicQuality(MagicQualityInterface::COMMON),
                10,
                '3b7ebe4f-01fb-4151-9fdc-35be3e2e78c8',
                'Превосходный Железный Нож',
                288,
                0,
                18,
                0,
                'offense.physicalDamage#10|offense.attackSpeed#120|offense.criticalChance#16%|offense.criticalMultiplier#200%|offense.criticalBleeding#1',
                '<div class="item_d_pl"><p>Физический урон</p></div><div class="item_d_pr"><p>10</p></div><div class="item_d_pl"><p>Скорость атаки</p></div><div class="item_d_pr"><p>1.2</p></div><div class="item_d_pl"><p>Шанс критического удара</p></div><div class="item_d_pr"><p>16%</p></div><div class="item_d_pl"><p>Сила критического удара</p></div><div class="item_d_pr"><p>200%</p></div><div class="item_d_w"><p>Вызывает кровотечение при критическом ударе</p></div><div class="item_d_pl"><p>Необходимо ловкости</p></div><div class="item_d_pr"><p>18</p></div>',
                new Base(48),
                $offense5,
                new Defense()
            ],
            // robe armor
            [
                Armor::get(5001),
                Fabric::get('barezh_fabric'),
                new Quality(QualityInterface::EXCELLENT, new GenderType(GenderTypeInterface::FEMALE)),
                new MagicQuality(MagicQualityInterface::COMMON),
                10,
                '3b7ebe4f-01fb-4151-9fdc-35be3e2e78c8',
                'Превосходная  Накидка Странника из Барежа',
                288,
                0,
                0,
                22,
                'defense.magicDefense#60|base.mana#+24',
                '<div class="item_d_pl"><p>Магическая защита</p></div><div class="item_d_pr"><p>60</p></div><div class="item_d_pl"><p>Мана</p></div><div class="item_d_pr"><p>+24</p></div><div class="item_d_pl"><p>Необходимо интеллекта</p></div><div class="item_d_pr"><p>22</p></div>',
                $base5,
                new Offense(),
                $defense5,
            ],
        ];
    }

    /**
     * @return array
     * @throws ItemException
     */
    public function generatorRelicItemDataProvider(): array
    {
        return [
            [
                DrawingFactory::create([
                    'id'               => 143,
                    'name'             => 'Short Sword',
                    'icon'             => 'sword.png',
                    'price'            => 1000,
                    'weight'           => 160,
                    'min_level'        => 4,
                    'strength'         => 0.7,
                    'dexterity'        => 0.5,
                    'intelligence'     => 0.0,
                    'affix_exception'  => [],
                    'type_id'          => ItemTypeInterface::EQUIP,
                    'equip_type_id'    => EquipTypeInterface::ONE_HAND,
                    'section_type_id'  => SectionTypeInterface::RIGHT_HAND,
                    'weapon_type_id'   => WeaponTypeInterface::SWORD,
                    'armor_type_id'    => null,
                    'potion_type_id'   => null,
                    'material_type_id' => null,
                    'gender_type_id'   => GenderTypeInterface::MALE,
                    'magic_type_id'    => MagicTypeInterface::ONE_HAND_WEAPON,
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
                        [
                            'name'    => 'offense.attackSpeed',
                            'value'   => 100,
                            'quality' => false,
                            'prefix'  => '',
                            'suffix'  => '',
                        ],
                    ],
                ]),
                Metal::get('iron'),
                30,
                '797504ce-4aca-446e-ae18-c9bc803ec114',
                'Железный Короткий Меч',
            ],
        ];
    }

    /**
     * @return array
     * @throws ItemException
     */
    public function addAffixExceptionsDataProvider(): array
    {
        return [
            [
                Wood::get('wood'),
                [
                    AffixTypeInterface::INCREASE_CAST_SPEED,
                    AffixTypeInterface::INCREASE_MAGIC_ACCURACY,
                    AffixTypeInterface::ADD_MAGIC_ACCURACY,
                    AffixTypeInterface::ADD_BLOCK_IGNORE,

                    AffixTypeInterface::INCREASE_FIRE_DAMAGE,
                    AffixTypeInterface::INCREASE_WATER_DAMAGE,
                    AffixTypeInterface::INCREASE_AIR_DAMAGE,
                    AffixTypeInterface::INCREASE_EARTH_DAMAGE,
                    AffixTypeInterface::INCREASE_LIFE_DAMAGE,
                    AffixTypeInterface::INCREASE_DEATH_DAMAGE,

                    AffixTypeInterface::DOUBLE_FIRE_DAMAGE,
                    AffixTypeInterface::DOUBLE_WATER_DAMAGE,
                    AffixTypeInterface::DOUBLE_AIR_DAMAGE,
                    AffixTypeInterface::DOUBLE_EARTH_DAMAGE,
                    AffixTypeInterface::DOUBLE_LIFE_DAMAGE,
                    AffixTypeInterface::DOUBLE_DEATH_DAMAGE,
                ],
            ],
            [
                Wood::get('mahogany'),
                [
                    AffixTypeInterface::INCREASE_CAST_SPEED,
                    AffixTypeInterface::INCREASE_MAGIC_ACCURACY,
                    AffixTypeInterface::ADD_MAGIC_ACCURACY,
                    AffixTypeInterface::ADD_BLOCK_IGNORE,

                    AffixTypeInterface::INCREASE_PHYSICAL_DAMAGE,
                    AffixTypeInterface::INCREASE_WATER_DAMAGE,
                    AffixTypeInterface::INCREASE_AIR_DAMAGE,
                    AffixTypeInterface::INCREASE_EARTH_DAMAGE,
                    AffixTypeInterface::INCREASE_LIFE_DAMAGE,
                    AffixTypeInterface::INCREASE_DEATH_DAMAGE,

                    AffixTypeInterface::DOUBLE_PHYSICAL_DAMAGE,
                    AffixTypeInterface::DOUBLE_WATER_DAMAGE,
                    AffixTypeInterface::DOUBLE_AIR_DAMAGE,
                    AffixTypeInterface::DOUBLE_EARTH_DAMAGE,
                    AffixTypeInterface::DOUBLE_LIFE_DAMAGE,
                    AffixTypeInterface::DOUBLE_DEATH_DAMAGE,
                ],
            ],
            [
                Wood::get('merbau_tree'),
                [
                    AffixTypeInterface::INCREASE_CAST_SPEED,
                    AffixTypeInterface::INCREASE_MAGIC_ACCURACY,
                    AffixTypeInterface::ADD_MAGIC_ACCURACY,
                    AffixTypeInterface::ADD_BLOCK_IGNORE,

                    AffixTypeInterface::INCREASE_PHYSICAL_DAMAGE,
                    AffixTypeInterface::INCREASE_FIRE_DAMAGE,
                    AffixTypeInterface::INCREASE_AIR_DAMAGE,
                    AffixTypeInterface::INCREASE_EARTH_DAMAGE,
                    AffixTypeInterface::INCREASE_LIFE_DAMAGE,
                    AffixTypeInterface::INCREASE_DEATH_DAMAGE,

                    AffixTypeInterface::DOUBLE_PHYSICAL_DAMAGE,
                    AffixTypeInterface::DOUBLE_FIRE_DAMAGE,
                    AffixTypeInterface::DOUBLE_AIR_DAMAGE,
                    AffixTypeInterface::DOUBLE_EARTH_DAMAGE,
                    AffixTypeInterface::DOUBLE_LIFE_DAMAGE,
                    AffixTypeInterface::DOUBLE_DEATH_DAMAGE,
                ],
            ],
            [
                Wood::get('amaranth_tree'),
                [
                    AffixTypeInterface::INCREASE_CAST_SPEED,
                    AffixTypeInterface::INCREASE_MAGIC_ACCURACY,
                    AffixTypeInterface::ADD_MAGIC_ACCURACY,
                    AffixTypeInterface::ADD_BLOCK_IGNORE,

                    AffixTypeInterface::INCREASE_PHYSICAL_DAMAGE,
                    AffixTypeInterface::INCREASE_FIRE_DAMAGE,
                    AffixTypeInterface::INCREASE_WATER_DAMAGE,
                    AffixTypeInterface::INCREASE_EARTH_DAMAGE,
                    AffixTypeInterface::INCREASE_LIFE_DAMAGE,
                    AffixTypeInterface::INCREASE_DEATH_DAMAGE,

                    AffixTypeInterface::DOUBLE_PHYSICAL_DAMAGE,
                    AffixTypeInterface::DOUBLE_FIRE_DAMAGE,
                    AffixTypeInterface::DOUBLE_WATER_DAMAGE,
                    AffixTypeInterface::DOUBLE_EARTH_DAMAGE,
                    AffixTypeInterface::DOUBLE_LIFE_DAMAGE,
                    AffixTypeInterface::DOUBLE_DEATH_DAMAGE,
                ],
            ],
            [
                Wood::get('oak'),
                [
                    AffixTypeInterface::INCREASE_CAST_SPEED,
                    AffixTypeInterface::INCREASE_MAGIC_ACCURACY,
                    AffixTypeInterface::ADD_MAGIC_ACCURACY,
                    AffixTypeInterface::ADD_BLOCK_IGNORE,

                    AffixTypeInterface::INCREASE_PHYSICAL_DAMAGE,
                    AffixTypeInterface::INCREASE_FIRE_DAMAGE,
                    AffixTypeInterface::INCREASE_WATER_DAMAGE,
                    AffixTypeInterface::INCREASE_AIR_DAMAGE,
                    AffixTypeInterface::INCREASE_LIFE_DAMAGE,
                    AffixTypeInterface::INCREASE_DEATH_DAMAGE,

                    AffixTypeInterface::DOUBLE_PHYSICAL_DAMAGE,
                    AffixTypeInterface::DOUBLE_FIRE_DAMAGE,
                    AffixTypeInterface::DOUBLE_WATER_DAMAGE,
                    AffixTypeInterface::DOUBLE_AIR_DAMAGE,
                    AffixTypeInterface::DOUBLE_LIFE_DAMAGE,
                    AffixTypeInterface::DOUBLE_DEATH_DAMAGE,
                ],
            ],
            [
                Wood::get('sacred_tree'),
                [
                    AffixTypeInterface::INCREASE_CAST_SPEED,
                    AffixTypeInterface::INCREASE_MAGIC_ACCURACY,
                    AffixTypeInterface::ADD_MAGIC_ACCURACY,
                    AffixTypeInterface::ADD_BLOCK_IGNORE,

                    AffixTypeInterface::INCREASE_PHYSICAL_DAMAGE,
                    AffixTypeInterface::INCREASE_FIRE_DAMAGE,
                    AffixTypeInterface::INCREASE_WATER_DAMAGE,
                    AffixTypeInterface::INCREASE_AIR_DAMAGE,
                    AffixTypeInterface::INCREASE_EARTH_DAMAGE,
                    AffixTypeInterface::INCREASE_DEATH_DAMAGE,

                    AffixTypeInterface::DOUBLE_PHYSICAL_DAMAGE,
                    AffixTypeInterface::DOUBLE_FIRE_DAMAGE,
                    AffixTypeInterface::DOUBLE_WATER_DAMAGE,
                    AffixTypeInterface::DOUBLE_AIR_DAMAGE,
                    AffixTypeInterface::DOUBLE_EARTH_DAMAGE,
                    AffixTypeInterface::DOUBLE_DEATH_DAMAGE,
                ],
            ],
            [
                Wood::get('bloody_tree'),
                [
                    AffixTypeInterface::INCREASE_CAST_SPEED,
                    AffixTypeInterface::INCREASE_MAGIC_ACCURACY,
                    AffixTypeInterface::ADD_MAGIC_ACCURACY,
                    AffixTypeInterface::ADD_BLOCK_IGNORE,

                    AffixTypeInterface::INCREASE_PHYSICAL_DAMAGE,
                    AffixTypeInterface::INCREASE_FIRE_DAMAGE,
                    AffixTypeInterface::INCREASE_WATER_DAMAGE,
                    AffixTypeInterface::INCREASE_AIR_DAMAGE,
                    AffixTypeInterface::INCREASE_EARTH_DAMAGE,
                    AffixTypeInterface::INCREASE_LIFE_DAMAGE,

                    AffixTypeInterface::DOUBLE_PHYSICAL_DAMAGE,
                    AffixTypeInterface::DOUBLE_FIRE_DAMAGE,
                    AffixTypeInterface::DOUBLE_WATER_DAMAGE,
                    AffixTypeInterface::DOUBLE_AIR_DAMAGE,
                    AffixTypeInterface::DOUBLE_EARTH_DAMAGE,
                    AffixTypeInterface::DOUBLE_LIFE_DAMAGE,
                ],
            ],
        ];
    }
}
