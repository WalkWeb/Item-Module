<?php

declare(strict_types=1);

namespace Tests\Item\Type\Section;

use Item\ItemException;
use Item\Type\Section\SectionType;
use PHPUnit\Framework\TestCase;

class SectionTypeTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param int $id
     * @param string $exceptedName
     * @throws ItemException
     */
    public function testSectionTypeCreateSuccess(int $id, string $exceptedName): void
    {
        $section = new SectionType($id);

        self::assertEquals($id, $section->getId());
        self::assertEquals($exceptedName, $section->getName());
    }

    public function testSectionTypeCreateFail(): void
    {
        $id = 99;
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::UNKNOWN_SECTION_TYPE . ': ' . $id);
        new SectionType($id);
    }

    /**
     * @return array
     */
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
