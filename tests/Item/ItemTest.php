<?php

declare(strict_types=1);

namespace Tests\Item;

use Exception;
use Item\Affix\Collection\AffixCollectionFactory;
use Item\Affix\Type\AffixTypeInterface;
use Item\Base\Base;
use Item\Defense\Defense;
use Item\Drawing\Stat\StatCollection;
use Item\Drawing\Stat\StatCollectionFactory;
use Item\Item;
use Item\ItemException;
use Item\ItemInterface;
use Item\Offense\Offense;
use Item\Translator\TranslatorInterface;
use Item\Translator\TranslatorRU;
use Item\Type\Armor\ArmorType;
use Item\Type\Armor\ArmorTypeInterface;
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
use Item\Type\Potion\PotionType;
use Item\Type\Potion\PotionTypeInterface;
use Item\Type\Section\SectionType;
use Item\Type\Section\SectionTypeInterface;
use Item\Type\Weapon\WeaponType;
use Item\Type\Weapon\WeaponTypeInterface;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testItemCreate(): void
    {
        $id = '18874763-440d-4bb0-90ea-904ebeb67294';
        $itemId = 5123;
        $itemLevel = 25;
        $inventoryId = '4cf7eb77-28da-433a-bedb-a256248e9837';
        $name = 'Sword';
        $icon = 'icon.png';
        $price = 150;
        $minLevel = 5;
        $minStrength = 85;
        $minDexterity = 50;
        $minIntelligence = 0;
        $type = new ItemType(ItemTypeInterface::EQUIP);
        $magicQuality = new MagicQuality(MagicQualityInterface::COMMON);
        $base = new Base(100);
        $equipType = new EquipType(EquipTypeInterface::ONE_HAND);
        $sectionType = new SectionType(SectionTypeInterface::LEFT_HAND);
        $weaponType = new WeaponType(WeaponTypeInterface::SWORD);
        $damageType = new DamageType(DamageTypeInterface::ATTACK);
        $armorType = null;
        $potionType = null;
        $offense = new Offense($weaponType, $damageType);
        $defense = new Defense();
        $magicType = new MagicType(MagicTypeInterface::ONE_HAND_WEAPON);
        $propertyInfo = '';
        $magicPropertyInfo = '';

        $item = new Item(
            $id,
            $itemId,
            $itemLevel,
            $inventoryId,
            $name,
            $icon,
            $price,
            $minLevel,
            $minStrength,
            $minDexterity,
            $minIntelligence,
            $propertyInfo,
            $magicPropertyInfo,
            $type,
            $magicQuality,
            $base,
            $offense,
            $defense,
            $equipType,
            $sectionType,
            $armorType,
            $potionType,
            $magicType,
        );

        $translator = new TranslatorRU();

        self::assertEquals($id, $item->getId());
        self::assertEquals($itemId, $item->getDbId());
        self::assertEquals($itemLevel, $item->getItemLevel());
        self::assertEquals($inventoryId, $item->getInventoryId());
        self::assertEquals($translator->trans($name), $item->getName($translator));
        self::assertEquals($name, $item->getNameSource());
        self::assertEquals($icon, $item->getIcon());
        self::assertEquals($price, $item->getPrice());
        self::assertEquals($minLevel, $item->getMinLevel());
        self::assertEquals($minStrength, $item->getMinStrength());
        self::assertEquals($minDexterity, $item->getMinDexterity());
        self::assertEquals($minIntelligence, $item->getMinIntelligence());
        self::assertEquals($propertyInfo, $item->getPropertyInfo());
        self::assertEquals($magicPropertyInfo, $item->getMagicPropertyInfo());
        self::assertEquals('', $item->getDescription($translator, 100, 100, 100));
        self::assertEquals('', $item->getMagicDescription($translator));
        self::assertEquals($type, $item->getType());
        self::assertEquals($magicQuality, $item->getMagicQuality());
        self::assertEquals($base, $item->getBase());
        self::assertEquals($offense, $item->getOffense());
        self::assertEquals($defense, $item->getDefense());
        self::assertEquals($equipType, $item->getEquipType());
        self::assertEquals($sectionType, $item->getSectionType());
        self::assertEquals($armorType, $item->getArmorType());
        self::assertEquals($potionType, $item->getPotionType());
        self::assertEquals($magicType, $item->getMagicType());
        self::assertFalse($item->isTwoHandWeapon());
        self::assertFalse($item->isShadow());

        $affixesData = [
            [
                'id'             => 0,
                'type_id'        => AffixTypeInterface::ADD_LIFE,
                'min_level'      => 1,
                'required_level' => 1,
                'rarity'         => 100,
                'price'          => 60,
                'mods'           => [
                    [
                        'name'      => 'base.life',
                        'prefix'    => '+',
                        'suffix'    => '',
                        'min_value' => 10,
                        'max_value' => 10,
                    ],
                ],
            ],
            [
                'id'             => 415,
                'type_id'        => AffixTypeInterface::BRUTALITY,
                'min_level'      => 21,
                'required_level' => 21,
                'rarity'         => 100,
                'price'          => 890,
                'mods'           => [
                    [
                        'name'      => 'base.life',
                        'prefix'    => '+',
                        'suffix'    => '',
                        'min_value' => 50,
                        'max_value' => 50,
                    ],
                    [
                        'name'      => 'base.mana',
                        'prefix'    => '',
                        'suffix'    => '',
                        'min_value' => -40,
                        'max_value' => -40,
                    ],
                ],
            ],
        ];

        $affixes = AffixCollectionFactory::create($affixesData);

        $item->applyAffixes($affixes, 1.0, 1.0);

        self::assertEquals(21, $item->getMinLevel());
        self::assertEquals($price + 60 + 890, $item->getPrice());
        self::assertEquals(
            '<p class="item_d_m">Здоровье +60</p><p class="item_d_m">Мана -40</p><div class="item_d_line"></div>',
            $item->getMagicDescription($translator)
        );

        $item->shadow();

        self::assertTrue($item->isShadow());
    }

    /**
     * @dataProvider methodNotFoundDataProvider
     * @param array $data
     * @param string $error
     * @throws ItemException
     */
    public function testItemApplyStatsMethodNotFound(array $data, string $error): void
    {
        $item = $this->getSword();

        $stats = StatCollectionFactory::create($data);

        $this->expectException(ItemException::class);
        $this->expectExceptionMessage($error);
        $item->applyStats($stats, 1.0, 1.0);
    }

    /**
     * @dataProvider getMagicDescriptionDataProvider
     * @param array $data
     * @param string $expectedDescription
     * @throws Exception
     */
    public function testItemGetMagicDescription(array $data, string $expectedDescription): void
    {
        $item = $this->getSword();

        $affixes = AffixCollectionFactory::create($data);

        $item->applyAffixes($affixes, 1.0, 1.0);

        self::assertEquals($expectedDescription, $item->getMagicDescription(new TranslatorRU()));
    }

    /**
     * @dataProvider getTypeDescriptionDataProvider
     * @param ItemInterface $item
     * @param TranslatorInterface $translator
     * @param string $expectedDescription
     */
    public function testItemGetTypeDescription(
        ItemInterface $item,
        TranslatorInterface $translator,
        string $expectedDescription
    ): void
    {
        self::assertEquals($expectedDescription, $item->getTypeDescription($translator));
    }

    /**
     * @dataProvider applyStatsDataProvider
     * @param StatCollection $stats
     * @param float $itemQuality
     * @param float $materialQuality
     * @param string $description
     * @throws ItemException
     */
    public function testItemApplyStatsSuccess(
        StatCollection $stats,
        float $itemQuality,
        float $materialQuality,
        string $description
    ): void
    {
        $item = $this->getTwoHandSword();
        $item->applyStats($stats, $itemQuality, $materialQuality);

        self::assertEquals($description, $item->getDescription(new TranslatorRU(), 100, 100, 100));
    }

    public function testItemIsTwoHandWeapon(): void
    {
        self::assertTrue($this->getTwoHandSword()->isTwoHandWeapon());
        self::assertFalse($this->getSword()->isTwoHandWeapon());
        self::assertFalse($this->getBook()->isTwoHandWeapon());
    }

    /**
     * @return array
     */
    public function methodNotFoundDataProvider(): array
    {
        return [
            [
                [
                    [
                        'name'    => 'unknown.criticalChance',
                        'value'   => 10,
                        'quality' => true,
                        'prefix'  => '',
                        'suffix'  => '%',
                    ],
                ],
                ItemException::METHOD_NOT_FOUND . ': getUnknown',
            ],
            [
                [
                    [
                        'name'    => 'base.unknown',
                        'value'   => 10,
                        'quality' => true,
                        'prefix'  => '',
                        'suffix'  => '%',
                    ],
                ],
                ItemException::METHOD_NOT_FOUND . ': addUnknown',
            ],
        ];
    }

    public function getMagicDescriptionDataProvider(): array
    {
        return [
            [
                [
                    [
                        'id'             => 0,
                        'type_id'        => AffixTypeInterface::ADD_LIFE,
                        'min_level'      => 1,
                        'required_level' => 1,
                        'rarity'         => 100,
                        'price'          => 60,
                        'mods'           => [
                            [
                                'name'      => 'base.life',
                                'prefix'    => '+',
                                'suffix'    => '',
                                'min_value' => 100,
                                'max_value' => 100,
                            ],
                        ],
                    ],
                    [
                        'id'             => 391,
                        'type_id'        => AffixTypeInterface::MIGHT,
                        'min_level'      => 20,
                        'required_level' => 18,
                        'rarity'         => 100,
                        'price'          => 1160,
                        'mods'           => [
                            [
                                'name'      => 'base.strength',
                                'prefix'    => '+',
                                'suffix'    => '',
                                'min_value' => 10,
                                'max_value' => 10,
                            ],
                            [
                                'name'      => 'base.life',
                                'prefix'    => '+',
                                'suffix'    => '',
                                'min_value' => 50,
                                'max_value' => 50,
                            ],
                        ],
                    ],
                    [
                        'id'             => 419,
                        'type_id'        => AffixTypeInterface::BRUTALITY,
                        'min_level'      => 11,
                        'required_level' => 11,
                        'rarity'         => 100,
                        'price'          => 310,
                        'mods'           => [
                            [
                                'name'      => 'base.mana',
                                'prefix'    => '+',
                                'suffix'    => '',
                                'min_value' => 30,
                                'max_value' => 30,
                            ],
                            [
                                'name'      => 'base.life',
                                'prefix'    => '',
                                'suffix'    => '',
                                'min_value' => -40,
                                'max_value' => -40,
                            ],
                        ],
                    ],
                ],
                '<p class="item_d_m">Здоровье +110</p><p class="item_d_m">Сила +10</p><p class="item_d_m">Мана +30</p><div class="item_d_line"></div>',
            ],
            [
                [
                    [
                        'id'             => 391,
                        'type_id'        => AffixTypeInterface::MIGHT,
                        'min_level'      => 20,
                        'required_level' => 18,
                        'rarity'         => 100,
                        'price'          => 1160,
                        'mods'           => [
                            [
                                'name'      => 'base.strength',
                                'prefix'    => '+',
                                'suffix'    => '',
                                'min_value' => 10,
                                'max_value' => 10,
                            ],
                            [
                                'name'      => 'base.life',
                                'prefix'    => '+',
                                'suffix'    => '',
                                'min_value' => 40,
                                'max_value' => 40,
                            ],
                        ],
                    ],
                    [
                        'id'             => 419,
                        'type_id'        => AffixTypeInterface::BRUTALITY,
                        'min_level'      => 11,
                        'required_level' => 11,
                        'rarity'         => 100,
                        'price'          => 310,
                        'mods'           => [
                            [
                                'name'      => 'base.mana',
                                'prefix'    => '+',
                                'suffix'    => '',
                                'min_value' => 30,
                                'max_value' => 30,
                            ],
                            [
                                'name'      => 'base.life',
                                'prefix'    => '',
                                'suffix'    => '',
                                'min_value' => -40,
                                'max_value' => -40,
                            ],
                        ],
                    ],
                ],
                '<p class="item_d_m">Сила +10</p><p class="item_d_m">Мана +30</p><div class="item_d_line"></div>',
            ],
            [
                [
                    [
                        'id'             => 437,
                        'type_id'        => AffixTypeInterface::ENCHANT,
                        'min_level'      => 24,
                        'required_level' => 23,
                        'rarity'         => 40,
                        'price'          => 3600,
                        'mods'           => [
                            [
                                'name'      => 'offense.increaseCriticalChance',
                                'prefix'    => '',
                                'suffix'    => '%',
                                'min_value' => 20,
                                'max_value' => 20,
                            ],
                            [
                                'name'      => 'offense.criticalMultiplier',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 25,
                                'max_value' => 25,
                            ],
                        ],
                    ],
                    [
                        'id'             => 257,
                        'type_id'        => AffixTypeInterface::INCREASE_CRITICAL_CHANCE,
                        'min_level'      => 25,
                        'required_level' => 22,
                        'rarity'         => 100,
                        'price'          => 1150,
                        'mods'           => [
                            [
                                'name'      => 'offense.increaseCriticalChance',
                                'prefix'    => '',
                                'suffix'    => '%',
                                'min_value' => 40,
                                'max_value' => 40,
                            ],
                        ],
                    ],
                ],
                '<p class="item_d_r">Шанса критического удара 20%</p><p class="item_d_r">Сила критического удара +25%</p><p class="item_d_m">Шанса критического удара 40%</p><div class="item_d_line"></div>',
            ],
            // fire max resist
            [
                [
                    [
                        'id'             => 289,
                        'type_id'        => AffixTypeInterface::ADD_MAX_PHYSICAL_RESIST,
                        'min_level'      => 24,
                        'required_level' => 23,
                        'rarity'         => 20,
                        'price'          => 3600,
                        'mods'           => [
                            [
                                'name'      => 'defense.physicalMaxResist',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 3,
                                'max_value' => 3,
                            ],
                        ],
                    ],
                ],
                '<p class="item_d_r">Максимальное сопротивление физическому урону +3%</p><div class="item_d_line"></div>',
            ],
            // all max resist = 1
            [
                [
                    [
                        'id'             => 308,
                        'type_id'        => AffixTypeInterface::ADD_MAX_ALL_RESIST,
                        'min_level'      => 22,
                        'required_level' => 19,
                        'rarity'         => 20,
                        'price'          => 5600,
                        'mods'           => [
                            [
                                'name'      => 'defense.physicalMaxResist',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 1,
                                'max_value' => 1,
                            ],
                            [
                                'name'      => 'defense.fireMaxResist',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 1,
                                'max_value' => 1,
                            ],
                            [
                                'name'      => 'defense.waterMaxResist',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 1,
                                'max_value' => 1,
                            ],
                            [
                                'name'      => 'defense.airMaxResist',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 1,
                                'max_value' => 1,
                            ],
                            [
                                'name'      => 'defense.earthMaxResist',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 1,
                                'max_value' => 1,
                            ],
                            [
                                'name'      => 'defense.lifeMaxResist',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 1,
                                'max_value' => 1,
                            ],
                            [
                                'name'      => 'defense.deathMaxResist',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 1,
                                'max_value' => 1,
                            ],
                        ],
                    ],
                ],
                '<p class="item_d_r">Все максимальные сопротивления +1%</p><div class="item_d_line"></div>',
            ],
            // all max resist + max fire resist
            [
                [
                    [
                        'id'             => 308,
                        'type_id'        => AffixTypeInterface::ADD_MAX_ALL_RESIST,
                        'min_level'      => 22,
                        'required_level' => 19,
                        'rarity'         => 20,
                        'price'          => 5600,
                        'mods'           => [
                            [
                                'name'      => 'defense.physicalMaxResist',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 1,
                                'max_value' => 1,
                            ],
                            [
                                'name'      => 'defense.fireMaxResist',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 1,
                                'max_value' => 1,
                            ],
                            [
                                'name'      => 'defense.waterMaxResist',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 1,
                                'max_value' => 1,
                            ],
                            [
                                'name'      => 'defense.airMaxResist',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 1,
                                'max_value' => 1,
                            ],
                            [
                                'name'      => 'defense.earthMaxResist',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 1,
                                'max_value' => 1,
                            ],
                            [
                                'name'      => 'defense.lifeMaxResist',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 1,
                                'max_value' => 1,
                            ],
                            [
                                'name'      => 'defense.deathMaxResist',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 1,
                                'max_value' => 1,
                            ],
                        ],
                    ],
                    [
                        'id'             => 291,
                        'type_id'        => AffixTypeInterface::ADD_MAX_FIRE_RESIST,
                        'min_level'      => 16,
                        'required_level' => 15,
                        'rarity'         => 20,
                        'price'          => 2140,
                        'mods'           => [
                            [
                                'name'      => 'defense.fireMaxResist',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 2,
                                'max_value' => 2,
                            ],
                        ],
                    ],
                ],
                '<p class="item_d_r">Максимальное сопротивление физическому урону +1%</p><p class="item_d_r">Максимальное сопротивление урону огнем +3%</p><p class="item_d_r">Максимальное сопротивление урону водой +1%</p><p class="item_d_r">Максимальное сопротивление урону воздухом +1%</p><p class="item_d_r">Максимальное сопротивление урону землей +1%</p><p class="item_d_r">Максимальное сопротивление урону магии жизни +1%</p><p class="item_d_r">Максимальное сопротивление урону магии смерти +1%</p><div class="item_d_line"></div>',
            ],
        ];
    }

    /**
     * @return array
     */
    public function getTypeDescriptionDataProvider(): array
    {
        return [
            [
                $this->getSword(),
                new TranslatorRU(),
                'Меч (Обычный предмет)',
            ],
            [
                $this->getArmor(),
                new TranslatorRU(),
                'Нагрудный Доспех (Обычный предмет)',
            ],
            [
                $this->getPotion(),
                new TranslatorRU(),
                'Зелье',
            ],
            [
                $this->getBook(),
                new TranslatorRU(),
                'Книга',
            ],
            [
                $this->getMaterial(),
                new TranslatorRU(),
                'Материал',
            ],
        ];
    }

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

    private function getTwoHandSword(): ItemInterface
    {
        $weaponType = new WeaponType(WeaponTypeInterface::TWO_HAND_SWORD);
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
            20,
            10,
            '',
            '',
            new ItemType(ItemTypeInterface::EQUIP),
            new MagicQuality(MagicQualityInterface::COMMON),
            new Base(100),
            new Offense($weaponType, $damageType),
            new Defense(),
            new EquipType(EquipTypeInterface::TWO_HAND),
            new SectionType(SectionTypeInterface::LEFT_HAND),
            null,
            null,
            new MagicType(MagicTypeInterface::TWO_HAND_WEAPON),
        );
    }

    private function getArmor(): ItemInterface
    {
        return new Item(
            'b9e5f6ef-7047-414e-b162-6d100311209b',
            1546,
            23,
            'ba1a729c-894d-4652-b62d-76c466f48f69',
            'Armor',
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
            new Offense(),
            new Defense(),
            new EquipType(EquipTypeInterface::ARMOR),
            new SectionType(SectionTypeInterface::ARMOR),
            new ArmorType(ArmorTypeInterface::HEAVY),
            null,
            new MagicType(MagicTypeInterface::ARMOR),
        );
    }

    private function getPotion(): ItemInterface
    {
        return new Item(
            'b9e5f6ef-7047-414e-b162-6d100311209b',
            1546,
            23,
            'ba1a729c-894d-4652-b62d-76c466f48f69',
            'Potion',
            'icon.png',
            150,
            5,
            50,
            0,
            0,
            '',
            '',
            new ItemType(ItemTypeInterface::POTION),
            new MagicQuality(MagicQualityInterface::COMMON),
            new Base(100),
            new Offense(),
            new Defense(),
            null,
            null,
            null,
            new PotionType(PotionTypeInterface::LIFE),
            null,
        );
    }

    private function getBook(): ItemInterface
    {
        return new Item(
            'b9e5f6ef-7047-414e-b162-6d100311209b',
            1546,
            23,
            'ba1a729c-894d-4652-b62d-76c466f48f69',
            'Bool',
            'icon.png',
            150,
            5,
            50,
            0,
            0,
            '',
            '',
            new ItemType(ItemTypeInterface::BOOK),
            new MagicQuality(MagicQualityInterface::COMMON),
            new Base(100),
            new Offense(),
            new Defense(),
            null,
            null,
            null,
            null,
            null,
        );
    }

    private function getMaterial(): ItemInterface
    {
        return new Item(
            'b9e5f6ef-7047-414e-b162-6d100311209b',
            1546,
            23,
            'ba1a729c-894d-4652-b62d-76c466f48f69',
            'Iron',
            'icon.png',
            150,
            5,
            50,
            0,
            0,
            '',
            '',
            new ItemType(ItemTypeInterface::MATERIAL),
            new MagicQuality(MagicQualityInterface::COMMON),
            new Base(100),
            new Offense(),
            new Defense(),
            null,
            null,
            null,
            null,
            null,
        );
    }

    /**
     * @return array
     * @throws ItemException
     */
    public function applyStatsDataProvider(): array
    {
        return [
            [
                StatCollectionFactory::create([
                    [
                        'name'    => 'offense.attackSpeed',
                        'value'   => 110,
                        'quality' => false,
                        'prefix'  => '',
                        'suffix'  => '',
                    ],
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
                        'prefix'  => '+',
                        'suffix'  => '%',
                    ],
                    [
                        'name'    => 'offense.criticalStun',
                        'value'   => 1,
                        'quality' => false,
                        'prefix'  => '',
                        'suffix'  => '',
                    ],
                ]),
                1,
                1,
                '<div class="item_d_pl"><p>Скорость атаки</p></div><div class="item_d_pr"><p>1.1</p></div><div class="item_d_pl"><p>Шанс критического удара</p></div><div class="item_d_pr"><p>10%</p></div><div class="item_d_pl"><p>Сила критического удара</p></div><div class="item_d_pr"><p>+200%</p></div><div class="item_d_w"><p>Оглушает при критическом ударе</p></div><div class="item_d_pl"><p>Необходимо силы</p></div><div class="item_d_pr"><p>50</p></div><div class="item_d_pl"><p>Необходимо ловкости</p></div><div class="item_d_pr"><p>20</p></div><div class="item_d_pl"><p>Необходимо интеллекта</p></div><div class="item_d_pr"><p>10</p></div>',
            ],
        ];
    }
}
