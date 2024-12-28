<?php

declare(strict_types=1);

namespace Tests\Item\Section;

use Item\ItemException;
use Item\Section\SectionType;
use PHPUnit\Framework\TestCase;

class SectionTypeTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param int $id
     * @param string $exceptedType
     * @throws ItemException
     */
    public function testSectionTypeCreateSuccess(int $id, string $exceptedType): void
    {
        $section = new SectionType($id);

        self::assertEquals($id, $section->getId());
        self::assertEquals($exceptedType, $section->getName());
    }

    public function testSectionTypeCreateFail(): void
    {
        $id = 99;
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::UNKNOWN_SECTION_ID . ': ' . $id);
        new SectionType($id);
    }

    public function successDataProvider(): array
    {
        return [
            [
                1,
                'right hand',
            ],
            [
                2,
                'left hand',
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
                'amulet',
            ],
            [
                8,
                'legs',
            ],
            [
                9,
                'ring',
            ],
            [
                10,
                'shoulders',
            ],
        ];
    }
}
