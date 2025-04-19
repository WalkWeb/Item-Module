<?php

declare(strict_types=1);

namespace Tests\Item\Affix\DataProvider;

use Exception;
use Item\Affix\DataProvider\AffixDataProvider;
use Item\Base\Base;
use Item\Defense\Defense;
use Item\Drawing\DataProvider\Crossbow;
use Item\Item;
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

class AffixDataProviderTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testAffixDataProviderGetAll(): void
    {
        $affixes = AffixDataProvider::getAll();

        self::assertCount(441, $affixes);

        $item = $this->getSword();

        foreach ($affixes as $affix) {
            foreach ($affix->getMods() as $mod) {
                $p = explode('.', $mod->getName());
                $group = 'get' . ucfirst($p[0]);
                $method = 'add' . ucfirst($p[1]);

                if ($mod->getMinValue() < 0 && $mod->getMaxValue() < 0) {
                    $value = random_int(abs($mod->getMinValue()), abs($mod->getMaxValue()));
                    $value = -$value;
                } else {
                    $value = random_int($mod->getMinValue(), $mod->getMaxValue());
                }

                $item->$group()->$method($value);
            }
        }
    }

    /**
     * @dataProvider getSuccessDataProvider
     * @param int $magicTypeId
     * @param int $magicQualityId
     * @param int $itemLevel
     * @param int $expectedCount
     * @throws Exception
     */
    public function testAffixDataProviderGetSuccess(int $magicTypeId, int $magicQualityId, int $itemLevel, int $expectedCount): void
    {
        $drawing = Crossbow::get(1001);
        $affixes = AffixDataProvider::get($drawing, new MagicType($magicTypeId), new MagicQuality($magicQualityId), $itemLevel);

        self::assertCount($expectedCount, $affixes);
    }

    /**
     * @return array
     */
    public function getSuccessDataProvider(): array
    {
        return [
            [
                MagicTypeInterface::RING,
                MagicQualityInterface::MAGIC,
                1,
                1,
            ],
            [
                MagicTypeInterface::RING,
                MagicQualityInterface::RELIC,
                1,
                8,
            ],
            [
                MagicTypeInterface::AMULET,
                MagicQualityInterface::RELIC,
                1,
                8,
            ],
            [
                MagicTypeInterface::HELMET,
                MagicQualityInterface::RELIC,
                1,
                8,
            ],
            [
                MagicTypeInterface::ARMOR,
                MagicQualityInterface::RELIC,
                1,
                8,
            ],
            [
                MagicTypeInterface::GLOVES,
                MagicQualityInterface::RELIC,
                1,
                8,
            ],
            [
                MagicTypeInterface::BOOTS,
                MagicQualityInterface::RELIC,
                1,
                8,
            ],
            [
                MagicTypeInterface::LEGS,
                MagicQualityInterface::RELIC,
                1,
                8,
            ],
            [
                MagicTypeInterface::SHIELD,
                MagicQualityInterface::RELIC,
                1,
                8,
            ],
            [
                MagicTypeInterface::ONE_HAND_WEAPON,
                MagicQualityInterface::RELIC,
                1,
                8,
            ],
            [
                MagicTypeInterface::TWO_HAND_WEAPON,
                MagicQualityInterface::RELIC,
                1,
                8,
            ],
            [
                MagicTypeInterface::SHOULDERS,
                MagicQualityInterface::RELIC,
                1,
                8,
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
