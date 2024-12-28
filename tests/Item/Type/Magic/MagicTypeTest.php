<?php

declare(strict_types=1);

namespace Tests\Item\Type\Magic;

use Item\ItemException;
use Item\Type\Magic\MagicType;
use PHPUnit\Framework\TestCase;

class MagicTypeTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param int $id
     * @param string $exceptedName
     * @throws ItemException
     */
    public function testMagicTypeCreateSuccess(int $id, string $exceptedName): void
    {
        $type = new MagicType($id);

        self::assertEquals($id, $type->getId());
        self::assertEquals($exceptedName, $type->getName());
    }

    public function testMagicTypeCreateFail(): void
    {
        $id = 99;
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::UNKNOWN_MAGIC_TYPE . ': ' . $id);
        new MagicType($id);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                1,
                'ring',
            ],
            [
                2,
                'amulet',
            ],
            [
                3,
                'helmet',
            ],
            [
                4,
                'armor',
            ],
            [
                5,
                'gloves',
            ],
            [
                6,
                'boots',
            ],
            [
                7,
                'legs',
            ],
            [
                8,
                'shield',
            ],
            [
                9,
                'one hand weapon',
            ],
            [
                10,
                'two hand weapon',
            ],
            [
                11,
                'shoulders',
            ],
        ];
    }
}
