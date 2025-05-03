<?php

declare(strict_types=1);

namespace Item\Material\DataProvider;

use Item\Material\Element\MaterialElement;
use Item\Type\Material\MaterialTypeInterface;

class Wood extends AbstractMaterialDataProvider
{
    protected static array $materials = [
        // Tier 1
        'wood'          => [
            'name'    => 'Wood',
            'icon'    => '/img/icon/woods/woods.png',
            'type'    => MaterialTypeInterface::WOOD,
            'level'   => 1,
            'quality' => 0.8,
            'prefix'  => '',
            'suffix'  => '',
            'element' => MaterialElement::PHYSICAL,
        ],
        'mahogany'      => [
            'name'    => 'Mahogany',
            'icon'    => '/img/icon/woods/mahogany.png',
            'type'    => MaterialTypeInterface::WOOD,
            'level'   => 2,
            'quality' => 1.0,
            'prefix'  => '',
            'suffix'  => 'mahogany',
            'element' => MaterialElement::FIRE,
        ],
        'merbau_tree'   => [
            'name'    => 'Merbau Tree',
            'icon'    => '/img/icon/woods/merbau_tree.png',
            'type'    => MaterialTypeInterface::WOOD,
            'level'   => 3,
            'quality' => 1.1,
            'prefix'  => '',
            'suffix'  => 'merbau_tree',
            'element' => MaterialElement::WATER,
        ],
        // Tier 2 [quality 1.2+]
        'amaranth_tree' => [
            'name'    => 'Amaranth Tree',
            'icon'    => '/img/icon/woods/amaranth_tree.png',
            'type'    => MaterialTypeInterface::WOOD,
            'level'   => 5,
            'quality' => 1.2,
            'prefix'  => '',
            'suffix'  => 'amaranth_tree',
            'element' => MaterialElement::AIR,
        ],
        'oak'           => [
            'name'    => 'Oak',
            'icon'    => '/img/icon/woods/oak.png',
            'type'    => MaterialTypeInterface::WOOD,
            'level'   => 7,
            'quality' => 1.3,
            'prefix'  => '',
            'suffix'  => 'oak',
            'element' => MaterialElement::EARTH,
        ],
        'sacred_tree'   => [
            'name'    => 'Sacred Tree',
            'icon'    => '/img/icon/woods/sacred_tree.png',
            'type'    => MaterialTypeInterface::WOOD,
            'level'   => 10,
            'quality' => 1.4,
            'prefix'  => '',
            'suffix'  => 'sacred_tree',
            'element' => MaterialElement::LIFE,
        ],
        'bloody_tree'   => [
            'name'    => 'Bloody Tree',
            'icon'    => '/img/icon/woods/bloody_tree.png',
            'type'    => MaterialTypeInterface::WOOD,
            'level'   => 12,
            'quality' => 1.4,
            'prefix'  => '',
            'suffix'  => 'bloody_tree',
            'element' => MaterialElement::DEATH,
        ],
        // Tier 3 [quality 1.5+]
        'sequoia' => [
            'name'    => 'Sequoia',
            'icon'    => '/img/icon/woods/sequoia.png',
            'type'    => MaterialTypeInterface::WOOD,
            'level'   => 14,
            'quality' => 1.5,
            'prefix'  => '',
            'suffix'  => 'sequoia',
            'element' => MaterialElement::PHYSICAL,
        ],
        'ruby_tree' => [
            'name'    => 'Ruby Tree',
            'icon'    => '/img/icon/woods/ruby_tree.png',
            'type'    => MaterialTypeInterface::WOOD,
            'level'   => 15,
            'quality' => 1.55,
            'prefix'  => '',
            'suffix'  => 'ruby_tree',
            'element' => MaterialElement::FIRE,
        ],
        'juniper' => [
            'name'    => 'Juniper',
            'icon'    => '/img/icon/woods/juniper.png',
            'type'    => MaterialTypeInterface::WOOD,
            'level'   => 16,
            'quality' => 1.6,
            'prefix'  => '',
            'suffix'  => 'juniper',
            'element' => MaterialElement::WATER,
        ],
        'sakura' => [
            'name'    => 'Sakura',
            'icon'    => '/img/icon/woods/sakura.png',
            'type'    => MaterialTypeInterface::WOOD,
            'level'   => 17,
            'quality' => 1.65,
            'prefix'  => '',
            'suffix'  => 'sakura',
            'element' => MaterialElement::AIR,
        ],
        'mangrove_tree' => [
            'name'    => 'Mangrove Tree',
            'icon'    => '/img/icon/woods/mangrove_tree.png',
            'type'    => MaterialTypeInterface::WOOD,
            'level'   => 18,
            'quality' => 1.7,
            'prefix'  => '',
            'suffix'  => 'mangrove_tree',
            'element' => MaterialElement::EARTH,
        ],
        'poisonous_tree' => [
            'name'    => 'Poisonous Tree',
            'icon'    => '/img/icon/woods/poisonous_tree.png',
            'type'    => MaterialTypeInterface::WOOD,
            'level'   => 20,
            'quality' => 1.75,
            'prefix'  => '',
            'suffix'  => 'poisonous_tree',
            'element' => MaterialElement::DEATH,
        ],
        'wisteria' => [
            'name'    => 'Wisteria',
            'icon'    => '/img/icon/woods/wisteria.png',
            'type'    => MaterialTypeInterface::WOOD,
            'level'   => 21,
            'quality' => 1.75,
            'prefix'  => '',
            'suffix'  => 'wisteria',
            'element' => MaterialElement::LIFE,
        ],
        // Tier 4 [quality 1.9+]
        'thousand_year_tree' => [
            'name'    => 'Thousand Year Tree',
            'icon'    => '/img/icon/woods/thousand_year_tree.png',
            'type'    => MaterialTypeInterface::WOOD,
            'level'   => 23,
            'quality' => 1.9,
            'prefix'  => '',
            'suffix'  => 'thousand_year_tree',
            'element' => MaterialElement::PHYSICAL,
        ],
    ];
}
