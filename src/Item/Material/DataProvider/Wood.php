<?php

declare(strict_types=1);

namespace Item\Material\DataProvider;

use Item\Material\Element\MaterialElement;

class Wood extends AbstractMaterialDataProvider
{
    protected static array $materials = [
        // Tier 1
        'wood'          => [
            'name'    => 'Wood',
            'icon'    => '/icon/woods/woods.png',
            'level'   => 1,
            'quality' => 0.8,
            'prefix'  => '',
            'suffix'  => '',
            'element' => MaterialElement::PHYSICAL,
        ],
        'mahogany'      => [
            'name'    => 'Mahogany',
            'icon'    => '/icon/woods/mahogany.png',
            'level'   => 2,
            'quality' => 1.0,
            'prefix'  => '',
            'suffix'  => 'mahogany',
            'element' => MaterialElement::FIRE,
        ],
        'merbau_tree'   => [
            'name'    => 'Merbau Tree',
            'icon'    => '/icon/woods/merbau_tree.png',
            'level'   => 3,
            'quality' => 1.1,
            'prefix'  => '',
            'suffix'  => 'merbau_tree',
            'element' => MaterialElement::WATER,
        ],
        // Tier 2 [quality 1.2+]
        'amaranth_tree' => [
            'name'    => 'Amaranth Tree',
            'icon'    => '/icon/woods/amaranth_tree.png',
            'level'   => 5,
            'quality' => 1.2,
            'prefix'  => '',
            'suffix'  => 'amaranth_tree',
            'element' => MaterialElement::AIR,
        ],
        'oak'           => [
            'name'    => 'Oak',
            'icon'    => '/icon/woods/oak.png',
            'level'   => 7,
            'quality' => 1.3,
            'prefix'  => '',
            'suffix'  => 'oak',
            'element' => MaterialElement::EARTH,
        ],
        'sacred_tree'   => [
            'name'    => 'Sacred Tree',
            'icon'    => '/icon/woods/sacred_tree.png',
            'level'   => 10,
            'quality' => 1.4,
            'prefix'  => '',
            'suffix'  => 'sacred_tree',
            'element' => MaterialElement::LIFE,
        ],
        'bloody_tree'   => [
            'name'    => 'Bloody Tree',
            'icon'    => '/icon/woods/bloody_tree.png',
            'level'   => 12,
            'quality' => 1.4,
            'prefix'  => '',
            'suffix'  => 'bloody_tree',
            'element' => MaterialElement::DEATH,
        ],
        // Tier 3 [quality 1.5+]
        'sequoia' => [
            'name'    => 'Sequoia',
            'icon'    => '/icon/woods/sequoia.png',
            'level'   => 14,
            'quality' => 1.5,
            'prefix'  => '',
            'suffix'  => 'sequoia',
            'element' => MaterialElement::PHYSICAL,
        ],
        'ruby_tree' => [
            'name'    => 'Ruby Tree',
            'icon'    => '/icon/woods/ruby_tree.png',
            'level'   => 15,
            'quality' => 1.55,
            'prefix'  => '',
            'suffix'  => 'ruby_tree',
            'element' => MaterialElement::FIRE,
        ],
        'juniper' => [
            'name'    => 'Juniper',
            'icon'    => '/icon/woods/juniper.png',
            'level'   => 16,
            'quality' => 1.6,
            'prefix'  => '',
            'suffix'  => 'juniper',
            'element' => MaterialElement::WATER,
        ],
        'sakura' => [
            'name'    => 'Sakura',
            'icon'    => '/icon/woods/sakura.png',
            'level'   => 17,
            'quality' => 1.65,
            'prefix'  => '',
            'suffix'  => 'sakura',
            'element' => MaterialElement::AIR,
        ],
        'mangrove_tree' => [
            'name'    => 'Mangrove Tree',
            'icon'    => '/icon/woods/mangrove_tree.png',
            'level'   => 18,
            'quality' => 1.7,
            'prefix'  => '',
            'suffix'  => 'mangrove_tree',
            'element' => MaterialElement::EARTH,
        ],
        'poisonous_tree' => [
            'name'    => 'Poisonous Tree',
            'icon'    => '/icon/woods/poisonous_tree.png',
            'level'   => 20,
            'quality' => 1.75,
            'prefix'  => '',
            'suffix'  => 'poisonous_tree',
            'element' => MaterialElement::DEATH,
        ],
        'wisteria' => [
            'name'    => 'Wisteria',
            'icon'    => '/icon/woods/wisteria.png',
            'level'   => 21,
            'quality' => 1.75,
            'prefix'  => '',
            'suffix'  => 'wisteria',
            'element' => MaterialElement::LIFE,
        ],
        // Tier 4 [quality 1.9+]
        'thousand_year_tree' => [
            'name'    => 'Thousand Year Tree',
            'icon'    => '/icon/woods/thousand_year_tree.png',
            'level'   => 23,
            'quality' => 1.9,
            'prefix'  => '',
            'suffix'  => 'thousand_year_tree',
            'element' => MaterialElement::PHYSICAL,
        ],
    ];
}
