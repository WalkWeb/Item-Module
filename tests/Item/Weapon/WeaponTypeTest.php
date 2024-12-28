<?php

declare(strict_types=1);

namespace Tests\Item\Weapon;

use Item\ItemException;
use Item\Weapon\WeaponType;
use PHPUnit\Framework\TestCase;

class WeaponTypeTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param int $id
     * @param string $exceptedName
     * @throws ItemException
     */
    public function testWeaponTypeCreateSuccess(int $id, string $exceptedName): void
    {
        $type = new WeaponType($id);

        self::assertEquals($id, $type->getId());
        self::assertEquals($exceptedName, $type->getName());
    }

    public function testWeaponTypeCreateFail(): void
    {
        $id = 99;
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::UNKNOWN_WEAPON_ID . ': ' . $id);
        new WeaponType($id);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            // one hand
            [
                1,
                'sword',
            ],
            [
                2,
                'axe',
            ],
            [
                3,
                'mace',
            ],
            [
                4,
                'dagger',
            ],
            [
                5,
                'spear',
            ],
            [
                6,
                'wand',
            ],
            [
                7,
                'heavy sword',
            ],
            [
                8,
                'heavy axe',
            ],
            [
                9,
                'heavy mace',
            ],
            // two hand
            [
                20,
                'bow',
            ],
            [
                21,
                'staff',
            ],
            [
                22,
                'two hand sword',
            ],
            [
                23,
                'two hand axe',
            ],
            [
                24,
                'two hand mace',
            ],
            [
                25,
                'two hand heavy sword',
            ],
            [
                26,
                'two hand heavy axe',
            ],
            [
                27,
                'two hand heavy mace',
            ],
            [
                28,
                'lance',
            ],
            [
                29,
                'crossbow',
            ],
            // unarmed
            [
                100,
                'fist',
            ],
        ];
    }
}
