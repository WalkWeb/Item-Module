<?php

declare(strict_types=1);

namespace Tests\Mock\Material\DataProvider;

use Item\Material\DataProvider\AbstractMaterialDataProvider;
use Item\Material\Element\MaterialElement;

class MaterialMissLevelDataProvider extends AbstractMaterialDataProvider
{
    protected static array $materials = [
        'cashmere_fabric'       => [
            'name'    => 'Cashmere Fabric',
            'icon'    => '/img/icon/cloths/fabric_04.png',
            'quality' => 1.5,
            'prefix'  => '',
            'suffix'  => 'cashmere_fabric',
            'element' => MaterialElement::PHYSICAL,
        ],
    ];
}
