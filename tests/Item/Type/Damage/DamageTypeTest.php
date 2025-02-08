<?php

declare(strict_types=1);

namespace Tests\Item\Type\Damage;

use Item\ItemException;
use Item\Type\Damage\DamageType;
use PHPUnit\Framework\TestCase;

class DamageTypeTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param int $id
     * @param string $exceptedName
     * @throws ItemException
     */
    public function testDamageTypeCreateSuccess(int $id, string $exceptedName): void
    {
        $type = new DamageType($id);

        self::assertEquals($id, $type->getId());
        self::assertEquals($exceptedName, $type->getName());
    }

    public function testDamageTypeCreateFail(): void
    {
        $id = 99;
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::UNKNOWN_DAMAGE_TYPE . ': ' . $id);
        new DamageType($id);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                1,
                'attack',
            ],
            [
                2,
                'spell',
            ],
        ];
    }
}
