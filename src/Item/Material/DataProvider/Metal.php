<?php

declare(strict_types=1);

namespace Item\Material\DataProvider;

use Item\Material\Element\MaterialElement;

class Metal extends AbstractMaterialDataProvider
{
    protected static array $materials = [
        // Tier 1
        'copper'            => [
            'name'    => 'Copper',
            'icon'    => '/icon/metals/copper.png',
            'level'   => 1,
            'quality' => 0.8,
            'prefix'  => 'copper',
            'suffix'  => '',
            'element' => MaterialElement::PHYSICAL,
        ],
        'iron'              => [
            'name'    => 'Iron',
            'icon'    => '/icon/metals/iron.png',
            'level'   => 1,
            'quality' => 1.0,
            'prefix'  => 'iron',
            'suffix'  => '',
            'element' => MaterialElement::PHYSICAL,
        ],
        'silver'            => [
            'name'    => 'Silver',
            'icon'    => '/icon/metals/silver.png',
            'level'   => 3,
            'quality' => 1.1,
            'prefix'  => 'silver',
            'suffix'  => '',
            'element' => MaterialElement::LIFE,
        ],
        // Tier 2
        'gold'              => [
            'name'    => 'Gold',
            'icon'    => '/icon/metals/gold.png',
            'level'   => 4,
            'quality' => 1.2,
            'prefix'  => 'gold',
            'suffix'  => '',
            'element' => MaterialElement::FIRE,
        ],
        'agatyp'            => [
            'name'    => 'Agatyp',
            'icon'    => '/icon/metals/agatyp.png',
            'level'   => 6,
            'quality' => 1.25,
            'prefix'  => 'agatyp',
            'suffix'  => '',
            'element' => MaterialElement::WATER,
        ],
        'white_metal'       => [
            'name'    => 'White Metal',
            'icon'    => '/icon/metals/talc.png',
            'level'   => 8,
            'quality' => 1.3,
            'prefix'  => 'white_metal',
            'suffix'  => '',
            'element' => MaterialElement::AIR,
        ],
        'miteril'           => [
            'name'    => 'Miteril',
            'icon'    => '/icon/metals/miteril.png',
            'level'   => 10,
            'quality' => 1.35,
            'prefix'  => 'miteril',
            'suffix'  => '',
            'element' => MaterialElement::EARTH,
        ],
        'doom_metal'        => [
            'name'    => 'Doom Metal',
            'icon'    => '/icon/metals/doom.png',
            'level'   => 12,
            'quality' => 1.4,
            'prefix'  => 'doom_metal',
            'suffix'  => '',
            'element' => MaterialElement::DEATH,
        ],
        // Tier 3
        'crystalline_metal' => [
            'name'    => 'Crystalline Metal',
            'icon'    => '/icon/metals/crystal.png',
            'level'   => 14,
            'quality' => 1.5,
            'prefix'  => 'crystalline_metal',
            'suffix'  => '',
            'element' => MaterialElement::PHYSICAL,
        ],
        'meteorite'         => [
            'name'    => 'Meteorite',
            'icon'    => '/icon/metals/meteorite.png',
            'level'   => 15,
            'quality' => 1.55,
            'prefix'  => 'meteorite',
            'suffix'  => '',
            'element' => MaterialElement::FIRE,
        ],
        'mithril'           => [
            'name'    => 'Mithril',
            'icon'    => '/icon/metals/mithril.png',
            'level'   => 16,
            'quality' => 1.6,
            'prefix'  => 'mithril',
            'suffix'  => '',
            'element' => MaterialElement::WATER,
        ],
        'valorite'          => [
            'name'    => 'Valorite',
            'icon'    => '/icon/metals/valorit.png',
            'level'   => 17,
            'quality' => 1.65,
            'prefix'  => 'valorite',
            'suffix'  => '',
            'element' => MaterialElement::AIR,
        ],
        'verite'            => [
            'name'    => 'Verite',
            'icon'    => '/icon/metals/verite.png',
            'level'   => 18,
            'quality' => 1.7,
            'prefix'  => 'verite',
            'suffix'  => '',
            'element' => MaterialElement::EARTH,
        ],
        'black_metal'       => [
            'name'    => 'Black Metal',
            'icon'    => '/icon/metals/black.png',
            'level'   => 20,
            'quality' => 1.75,
            'prefix'  => 'black_metal',
            'suffix'  => '',
            'element' => MaterialElement::DEATH,
        ],
        'heavenly_metal'    => [
            'name'    => 'Heavenly Metal',
            'icon'    => '/icon/metals/heaven.png',
            'level'   => 21,
            'quality' => 1.75,
            'prefix'  => 'heavenly_metal',
            'suffix'  => '',
            'element' => MaterialElement::LIFE,
        ],
        // Tier 4
        'titan'             => [
            'name'    => 'Titan',
            'icon'    => '/icon/metals/titan.png',
            'level'   => 23,
            'quality' => 1.9,
            'prefix'  => 'titan',
            'suffix'  => '',
            'element' => MaterialElement::PHYSICAL,
        ],
    ];
}
