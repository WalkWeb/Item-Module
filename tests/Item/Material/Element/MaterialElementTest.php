<?php

declare(strict_types=1);

namespace Tests\Item\Material\Element;

use Item\ItemException;
use Item\Material\Element\MaterialElement;
use PHPUnit\Framework\TestCase;

class MaterialElementTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param int $id
     * @param string $exceptedName
     * @throws ItemException
     */
    public function testMaterialElementCreateSuccess(int $id, string $exceptedName): void
    {
        $element = new MaterialElement($id);

        self::assertEquals($id, $element->getId());
        self::assertEquals($exceptedName, $element->getName());
    }

    public function testMaterialElementCreateFail(): void
    {
        $id = 99;
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::UNKNOWN_MATERIAL_ELEMENT . ': ' . $id);
        new MaterialElement($id);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                1,
                'Physical',
            ],
            [
                2,
                'Fire',
            ],
            [
                3,
                'Water',
            ],
            [
                4,
                'Air',
            ],
            [
                5,
                'Earth',
            ],
            [
                6,
                'Life',
            ],
            [
                7,
                'Death',
            ],
        ];
    }
}
