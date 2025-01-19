<?php

declare(strict_types=1);

namespace Tests\Item\Type\Equip;

use Item\Type\Equip\EquipType;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class EquipTypeTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param int $id
     * @param string $exceptedName
     * @throws ItemException
     */
    public function testEquipTypeCreateSuccess(int $id, string $exceptedName): void
    {
        $equip = new EquipType($id);

        self::assertEquals($id, $equip->getId());
        self::assertEquals($exceptedName, $equip->getName());
    }

    public function testEquipTypeCreateFail(): void
    {
        $id = 99;
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::UNKNOWN_EQUIP_TYPE . ': ' . $id);
        new EquipType($id);
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
                'shoulders',
            ],
            [
                9,
                'shield',
            ],
            [
                10,
                'one hand',
            ],
            [
                11,
                'two hand',
            ],
        ];
    }
}
