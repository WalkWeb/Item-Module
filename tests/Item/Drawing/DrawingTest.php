<?php

declare(strict_types=1);

namespace Tests\Item\Drawing;

use Item\Affix\Type\AffixTypeInterface;
use Item\Drawing\DrawingFactory;
use Item\Type\Equip\EquipTypeInterface;
use Item\Type\Gender\GenderTypeInterface;
use Item\Type\ItemTypeInterface;
use Item\Type\Magic\MagicTypeInterface;
use Item\Type\Section\SectionTypeInterface;
use Item\Type\Weapon\WeaponTypeInterface;
use PHPUnit\Framework\TestCase;

class DrawingTest extends TestCase
{
    public function testDrawingAddAffixException(): void
    {
        $exception = [
            AffixTypeInterface::INCREASE_CAST_SPEED,
            AffixTypeInterface::INCREASE_MAGIC_ACCURACY,
            AffixTypeInterface::ADD_MAGIC_ACCURACY,
            AffixTypeInterface::ADD_BLOCK_IGNORE,
        ];

        $drawing = DrawingFactory::create([
            'id'               => 143,
            'name'             => 'Sword',
            'icon'             => 'icon.png',
            'weight'           => 160,
            'min_level'        => 4,
            'strength'         => 0.7,
            'dexterity'        => 0.5,
            'intelligence'     => 0.0,
            'affix_exception'  => $exception,
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
                    'prefix'  => '+',
                    'suffix'  => '',
                ],
            ],
        ]);

        self::assertEquals($exception, $drawing->getAffixException());

        $drawing->addAffixException([
            AffixTypeInterface::ENCHANT,
        ]);

        $exception[] = AffixTypeInterface::ENCHANT;

        self::assertEquals($exception, $drawing->getAffixException());
    }
}
