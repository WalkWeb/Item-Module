<?php

declare(strict_types=1);

namespace Tests\Item\Type\Potion;

use Item\ItemException;
use Item\Type\Potion\PotionType;
use PHPUnit\Framework\TestCase;

class PotionTypeTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param int $id
     * @param string $exceptedName
     * @throws ItemException
     */
    public function testPotionTypeCreateSuccess(int $id, string $exceptedName): void
    {
        $type = new PotionType($id);

        self::assertEquals($id, $type->getId());
        self::assertEquals($exceptedName, $type->getName());
    }

    public function testPotionTypeCreateFail(): void
    {
        $id = 99;
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::UNKNOWN_POTION_TYPE . ': ' . $id);
        new PotionType($id);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                1,
                'life',
            ],
            [
                2,
                'mana',
            ],
            [
                3,
                'stamina',
            ],
            [
                4,
                'horror',
            ],
        ];
    }
}
