<?php

declare(strict_types=1);

namespace Item\Material\DataProvider;

use Item\Material\Element\MaterialElement;
use Item\Type\Material\MaterialTypeInterface;

class Fabric extends AbstractMaterialDataProvider
{
    protected static array $materials = [
        'ajura_fabric'          => [
            'name'    => 'Ajura Fabric',
            'icon'    => '/icon/cloths/fabric_02.png',
            'type'    => MaterialTypeInterface::CLOTH,
            'level'   => 1,
            'quality' => 1.0,
            'prefix'  => '',
            'suffix'  => 'ajura_fabric',
            'element' => MaterialElement::PHYSICAL,
        ],
        'aksamit_fabric'        => [
            'name'    => 'Aksamit Fabric',
            'icon'    => '/icon/cloths/fabric_16.png',
            'type'    => MaterialTypeInterface::CLOTH,
            'level'   => 2,
            'quality' => 1.1,
            'prefix'  => '',
            'suffix'  => 'aksamit_fabric',
            'element' => MaterialElement::PHYSICAL,
        ],
        'altabas_fabric'        => [
            'name'    => 'Altabas Fabric',
            'icon'    => '/icon/cloths/fabric_21.png',
            'type'    => MaterialTypeInterface::CLOTH,
            'level'   => 4,
            'quality' => 1.2,
            'prefix'  => '',
            'suffix'  => 'altabas_fabric',
            'element' => MaterialElement::PHYSICAL,
        ],
        'barezh_fabric'         => [
            'name'    => 'Barezh Fabric',
            'icon'    => '/icon/cloths/fabric_29.png',
            'type'    => MaterialTypeInterface::CLOTH,
            'level'   => 6,
            'quality' => 1.25,
            'prefix'  => '',
            'suffix'  => 'barezh_fabric',
            'element' => MaterialElement::PHYSICAL,
        ],
        'velvet_fabric'         => [
            'name'    => 'velvet_fabric',
            'icon'    => '/icon/cloths/fabric_20.png',
            'type'    => MaterialTypeInterface::CLOTH,
            'level'   => 8,
            'quality' => 1.3,
            'prefix'  => '',
            'suffix'  => 'velvet_fabric',
            'element' => MaterialElement::PHYSICAL,
        ],
        'velour_fabric'         => [
            'name'    => 'Velour Fabric',
            'icon'    => '/icon/cloths/fabric_07.png',
            'type'    => MaterialTypeInterface::CLOTH,
            'level'   => 11,
            'quality' => 1.4,
            'prefix'  => '',
            'suffix'  => 'velour_fabric',
            'element' => MaterialElement::PHYSICAL,
        ],
        'cashmere_fabric'       => [
            'name'    => 'Cashmere Fabric',
            'icon'    => '/icon/cloths/fabric_04.png',
            'type'    => MaterialTypeInterface::CLOTH,
            'level'   => 13,
            'quality' => 1.5,
            'prefix'  => '',
            'suffix'  => 'cashmere_fabric',
            'element' => MaterialElement::PHYSICAL,
        ],
        'elven_flannel_fabric'  => [
            'name'    => 'Elven Flannel Fabric',
            'icon'    => '/icon/cloths/fabric_09.png',
            'type'    => MaterialTypeInterface::CLOTH,
            'level'   => 16,
            'quality' => 1.6,
            'prefix'  => '',
            'suffix'  => 'elven_flannel_fabric',
            'element' => MaterialElement::PHYSICAL,
        ],
        'merino_wool_fabric'    => [
            'name'    => 'Merino Wool Fabric',
            'icon'    => '/icon/cloths/fabric_17.png',
            'type'    => MaterialTypeInterface::CLOTH,
            'level'   => 19,
            'quality' => 1.7,
            'prefix'  => '',
            'suffix'  => 'merino_wool_fabric',
            'element' => MaterialElement::PHYSICAL,
        ],
        'siren_satin_fabric'    => [
            'name'    => 'Siren Satin Fabric',
            'icon'    => '/icon/cloths/fabric_05.png',
            'type'    => MaterialTypeInterface::CLOTH,
            'level'   => 21,
            'quality' => 1.8,
            'prefix'  => '',
            'suffix'  => 'siren_satin_fabric',
            'element' => MaterialElement::PHYSICAL,
        ],
        'crimson_visson_fabric' => [
            'name'    => 'Crimson Visson Fabric',
            'icon'    => '/icon/cloths/fabric_11.png',
            'type'    => MaterialTypeInterface::CLOTH,
            'level'   => 23,
            'quality' => 1.9,
            'prefix'  => '',
            'suffix'  => 'crimson_visson_fabric',
            'element' => MaterialElement::PHYSICAL,
        ],
    ];
}
