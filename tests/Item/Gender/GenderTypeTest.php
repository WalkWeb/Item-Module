<?php

declare(strict_types=1);

namespace Tests\Item\Gender;

use Item\Gender\GenderType;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class GenderTypeTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param int $id
     * @param string $exceptedName
     * @throws ItemException
     */
    public function testGenderTypeCreateSuccess(int $id, string $exceptedName): void
    {
        $type = new GenderType($id);

        self::assertEquals($id, $type->getId());
        self::assertEquals($exceptedName, $type->getName());
    }

    public function testGenderTypeCreateFail(): void
    {
        $id = 99;
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::UNKNOWN_GENDER_TYPE . ': ' . $id);
        new GenderType($id);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                1,
                'male',
            ],
            [
                2,
                'female',
            ],
            [
                3,
                'average',
            ],
            [
                4,
                'multiple',
            ],
        ];
    }
}
