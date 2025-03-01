<?php

declare(strict_types=1);

namespace Tests\Mock\Material\DataProvider;

use Item\Material\DataProvider\AbstractMaterialDataProvider;

class MaterialNoArrayDataProvider extends AbstractMaterialDataProvider
{
    protected static array $materials = [
        'data',
    ];
}
