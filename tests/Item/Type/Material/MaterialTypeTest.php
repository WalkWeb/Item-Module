<?php

declare(strict_types=1);

namespace Tests\Item\Type\Material;

use Item\ItemException;
use Item\Type\Material\MaterialType;
use PHPUnit\Framework\TestCase;

class MaterialTypeTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param int $id
     * @param string $exceptedName
     * @throws ItemException
     */
    public function testMaterialTypeCreateSuccess(int $id, string $exceptedName): void
    {
        $type = new MaterialType($id);

        self::assertEquals($id, $type->getId());
        self::assertEquals($exceptedName, $type->getName());
    }

    public function testMaterialTypeCreateFail(): void
    {
        $id = 99;
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::UNKNOWN_MATERIAL_TYPE . ': ' . $id);
        new MaterialType($id);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                1,
                'metal',
            ],
            [
                2,
                'wood',
            ],
            [
                3,
                'leather',
            ],
            [
                4,
                'cloth',
            ],
        ];
    }
}
