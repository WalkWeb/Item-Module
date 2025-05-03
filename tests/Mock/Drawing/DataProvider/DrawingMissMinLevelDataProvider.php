<?php

declare(strict_types=1);

namespace Tests\Mock\Drawing\DataProvider;

use Item\Drawing\DataProvider\AbstractDrawingDataProvider;
use Item\Type\Equip\EquipTypeInterface;
use Item\Type\Gender\GenderTypeInterface;
use Item\Type\ItemTypeInterface;
use Item\Type\Magic\MagicTypeInterface;
use Item\Type\Material\MaterialTypeInterface;
use Item\Type\Section\SectionTypeInterface;
use Item\Type\Weapon\WeaponTypeInterface;

/**
 * Example invalid DataProvider - miss min_level parameter
 *
 * @package Tests\Mock\Drawing\DataProvider
 */
class DrawingMissMinLevelDataProvider extends AbstractDrawingDataProvider
{
    protected static array $drawings = [
        [
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
            'weight'           => 160,
            'strength'         => 0.6,
            'intelligence'     => 0.0,
            'dexterity'        => 0.6,
            'stats'            => [
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
                    'name'    => 'offense.attackSpeed',
                    'value'   => 100,
                    'quality' => false,
                    'suffix'  => '',
                ],
            ],
        ],
    ];
}
