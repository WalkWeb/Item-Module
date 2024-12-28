<?php

declare(strict_types=1);

namespace Tests\Item\Type;

use Item\ItemException;
use Item\Type\ItemType;
use PHPUnit\Framework\TestCase;

class ItemTypeTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param int $id
     * @param string $exceptedName
     * @throws ItemException
     */
    public function testItemTypeCreateSuccess(int $id, string $exceptedName): void
    {
        $type = new ItemType($id);

        self::assertEquals($id, $type->getId());
        self::assertEquals($exceptedName, $type->getName());
    }

    public function testItemTypeCreateFail(): void
    {
        $id = 99;
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::UNKNOWN_TYPE_ID . ': ' . $id);
        new ItemType($id);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                1,
                'equip',
            ],
            [
                2,
                'potion',
            ],
            [
                3,
                'material',
            ],
            [
                4,
                'book',
            ],
        ];
    }
}
