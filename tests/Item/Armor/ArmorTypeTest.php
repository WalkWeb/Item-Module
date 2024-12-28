<?php

declare(strict_types=1);

namespace Tests\Item\Armor;

use Item\Armor\ArmorType;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class ArmorTypeTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param int $id
     * @param string $exceptedName
     * @throws ItemException
     */
    public function testArmorTypeCreateSuccess(int $id, string $exceptedName): void
    {
        $type = new ArmorType($id);

        self::assertEquals($id, $type->getId());
        self::assertEquals($exceptedName, $type->getName());
    }

    public function testArmorTypeCreateFail(): void
    {
        $id = 99;
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::UNKNOWN_ARMOR_TYPE . ': ' . $id);
        new ArmorType($id);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                1,
                'robe',
            ],
            [
                2,
                'light',
            ],
            [
                3,
                'middle',
            ],
            [
                4,
                'heavy',
            ],
        ];
    }
}
