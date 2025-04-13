<?php

declare(strict_types=1);

namespace Item\Drawing\DataProvider;

use Item\Affix\Type\AffixTypeInterface;
use Item\Type\Armor\ArmorTypeInterface;
use Item\Type\Equip\EquipTypeInterface;
use Item\Type\Gender\GenderTypeInterface;
use Item\Type\ItemTypeInterface;
use Item\Type\Magic\MagicTypeInterface;
use Item\Type\Material\MaterialTypeInterface;
use Item\Type\Section\SectionTypeInterface;

class Shield extends AbstractDrawingDataProvider
{
    protected static array $drawings = [
        5601 => [
            'id'               => 5601,
            'name'             => 'Round Shield',
            'icon'             => '/img/icon/items/shields/01.png',
            'type_id'          => ItemTypeInterface::EQUIP,
            'equip_type_id'    => EquipTypeInterface::SHIELD,
            'armor_type_id'    => ArmorTypeInterface::MIDDLE,
            'magic_type_id'    => MagicTypeInterface::SHIELD,
            'section_type_id'  => SectionTypeInterface::LEFT_HAND,
            'material_type_id' => MaterialTypeInterface::METAL,
            'gender_type_id'   => GenderTypeInterface::MALE,
            'weight'           => 110,
            'min_level'        => 1,
            'strength'         => 1.0,
            'intelligence'     => 0.0,
            'dexterity'        => 0.0,
            'affix_exception'  => [
                AffixTypeInterface::ADD_DEFENSE,
                AffixTypeInterface::ADD_MAGIC_DEFENSE,
                AffixTypeInterface::INCREASE_DEFENSE,
                AffixTypeInterface::INCREASE_MAGIC_DEFENSE,
            ],
            'stats'            => [
                [
                    'name'    => 'defense.block',
                    'value'   => 25,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                [
                    'name'    => 'defense.magicBlock',
                    'value'   => 25,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
            ],
        ],
        5602 => [
            'id'               => 5602,
            'name'             => 'Militiaman‘s Shield',
            'icon'             => '/img/icon/items/shields/02.png',
            'type_id'          => ItemTypeInterface::EQUIP,
            'equip_type_id'    => EquipTypeInterface::SHIELD,
            'armor_type_id'    => ArmorTypeInterface::MIDDLE,
            'magic_type_id'    => MagicTypeInterface::SHIELD,
            'section_type_id'  => SectionTypeInterface::LEFT_HAND,
            'material_type_id' => MaterialTypeInterface::METAL,
            'gender_type_id'   => GenderTypeInterface::MALE,
            'weight'           => 130,
            'min_level'        => 5,
            'strength'         => 1.0,
            'intelligence'     => 0.0,
            'dexterity'        => 0.0,
            'affix_exception'  => [
                AffixTypeInterface::ADD_DEFENSE,
                AffixTypeInterface::ADD_MAGIC_DEFENSE,
                AffixTypeInterface::INCREASE_DEFENSE,
                AffixTypeInterface::INCREASE_MAGIC_DEFENSE,
            ],
            'stats'            => [
                [
                    'name'    => 'defense.block',
                    'value'   => 28,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                [
                    'name'    => 'defense.magicBlock',
                    'value'   => 28,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
            ],
        ],
        5603 => [
            'id'               => 5603,
            'name'             => 'Teardrop Shield',
            'icon'             => '/img/icon/items/shields/03.png',
            'type_id'          => ItemTypeInterface::EQUIP,
            'equip_type_id'    => EquipTypeInterface::SHIELD,
            'armor_type_id'    => ArmorTypeInterface::MIDDLE,
            'magic_type_id'    => MagicTypeInterface::SHIELD,
            'section_type_id'  => SectionTypeInterface::LEFT_HAND,
            'material_type_id' => MaterialTypeInterface::METAL,
            'gender_type_id'   => GenderTypeInterface::MALE,
            'weight'           => 145,
            'min_level'        => 9,
            'strength'         => 1.0,
            'intelligence'     => 0.0,
            'dexterity'        => 0.0,
            'affix_exception'  => [
                AffixTypeInterface::ADD_DEFENSE,
                AffixTypeInterface::ADD_MAGIC_DEFENSE,
                AffixTypeInterface::INCREASE_DEFENSE,
                AffixTypeInterface::INCREASE_MAGIC_DEFENSE,
            ],
            'stats'            => [
                [
                    'name'    => 'defense.block',
                    'value'   => 30,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                [
                    'name'    => 'defense.magicBlock',
                    'value'   => 30,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
            ],
        ],
        5604 => [
            'id'               => 5604,
            'name'             => 'Dwarven Shield',
            'icon'             => '/img/icon/items/shields/04.png',
            'type_id'          => ItemTypeInterface::EQUIP,
            'equip_type_id'    => EquipTypeInterface::SHIELD,
            'armor_type_id'    => ArmorTypeInterface::MIDDLE,
            'magic_type_id'    => MagicTypeInterface::SHIELD,
            'section_type_id'  => SectionTypeInterface::LEFT_HAND,
            'material_type_id' => MaterialTypeInterface::METAL,
            'gender_type_id'   => GenderTypeInterface::MALE,
            'weight'           => 160,
            'min_level'        => 13,
            'strength'         => 1.0,
            'intelligence'     => 0.0,
            'dexterity'        => 0.0,
            'affix_exception'  => [
                AffixTypeInterface::ADD_DEFENSE,
                AffixTypeInterface::ADD_MAGIC_DEFENSE,
                AffixTypeInterface::INCREASE_DEFENSE,
                AffixTypeInterface::INCREASE_MAGIC_DEFENSE,
            ],
            'stats'            => [
                [
                    'name'    => 'defense.block',
                    'value'   => 32,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                [
                    'name'    => 'defense.magicBlock',
                    'value'   => 32,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
            ],
        ],
        5605 => [
            'id'               => 5605,
            'name'             => 'Knight‘s Shield',
            'icon'             => '/img/icon/items/shields/05.png',
            'type_id'          => ItemTypeInterface::EQUIP,
            'equip_type_id'    => EquipTypeInterface::SHIELD,
            'armor_type_id'    => ArmorTypeInterface::MIDDLE,
            'magic_type_id'    => MagicTypeInterface::SHIELD,
            'section_type_id'  => SectionTypeInterface::LEFT_HAND,
            'material_type_id' => MaterialTypeInterface::METAL,
            'gender_type_id'   => GenderTypeInterface::MALE,
            'weight'           => 180,
            'min_level'        => 18,
            'strength'         => 1.0,
            'intelligence'     => 0.0,
            'dexterity'        => 0.0,
            'affix_exception'  => [
                AffixTypeInterface::ADD_DEFENSE,
                AffixTypeInterface::ADD_MAGIC_DEFENSE,
                AffixTypeInterface::INCREASE_DEFENSE,
                AffixTypeInterface::INCREASE_MAGIC_DEFENSE,
            ],
            'stats'            => [
                [
                    'name'    => 'defense.block',
                    'value'   => 35,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                [
                    'name'    => 'defense.magicBlock',
                    'value'   => 35,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
            ],
        ],
        5606 => [
            'id'               => 5606,
            'name'             => 'Gothic Shield',
            'icon'             => '/img/icon/items/shields/06.png',
            'type_id'          => ItemTypeInterface::EQUIP,
            'equip_type_id'    => EquipTypeInterface::SHIELD,
            'armor_type_id'    => ArmorTypeInterface::MIDDLE,
            'magic_type_id'    => MagicTypeInterface::SHIELD,
            'section_type_id'  => SectionTypeInterface::LEFT_HAND,
            'material_type_id' => MaterialTypeInterface::METAL,
            'gender_type_id'   => GenderTypeInterface::MALE,
            'weight'           => 210,
            'min_level'        => 22,
            'strength'         => 1.0,
            'intelligence'     => 0.0,
            'dexterity'        => 0.0,
            'affix_exception'  => [
                AffixTypeInterface::ADD_DEFENSE,
                AffixTypeInterface::ADD_MAGIC_DEFENSE,
                AffixTypeInterface::INCREASE_DEFENSE,
                AffixTypeInterface::INCREASE_MAGIC_DEFENSE,
            ],
            'stats'            => [
                [
                    'name'    => 'defense.block',
                    'value'   => 37,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                [
                    'name'    => 'defense.magicBlock',
                    'value'   => 37,
                    'quality' => false,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
            ],
        ],
    ];
}
