<?php

declare(strict_types=1);

namespace Tests\Item\MagicQuality;

use Item\ItemException;
use Item\Type\MagicQuality\MagicQuality;
use PHPUnit\Framework\TestCase;

class MagicQualityTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param int $id
     * @param string $expectedName
     * @param string $expectedClassColor
     * @param int $expectedMinQuality
     * @param int $expectedMaxQuality
     * @throws ItemException
     */
    public function testMagicQualityCreateSuccess(
        int $id,
        string $expectedName,
        string $expectedClassColor,
        int $expectedMinQuality,
        int $expectedMaxQuality
    ): void
    {
        $magicQuality = new MagicQuality($id);

        self::assertEquals($id, $magicQuality->getId());
        self::assertEquals($expectedName, $magicQuality->getName());
        self::assertEquals($expectedClassColor, $magicQuality->getClassColor());
        self::assertEquals($expectedMinQuality, $magicQuality->getMinQuality());
        self::assertEquals($expectedMaxQuality, $magicQuality->getMaxQuality());
    }

    public function testMagicQualityCreateFail(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::UNKNOWN_MAGIC_QUALITY_TYPE);
        new MagicQuality(999);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                0,
                'Common item',
                'common_item_color',
                0,
                6,
            ],
            [
                1,
                'Magic item',
                'magic_item_color',
                0,
                6,
            ],
            [
                2,
                'Enchanted item',
                'enchanted_item_color',
                1,
                6,
            ],
            [
                3,
                'Rare item',
                'rare_item_color',
                2,
                6,
            ],
            [
                4,
                'Mystical item',
                'mystic_item_color',
                3,
                7,
            ],
            [
                5,
                'Legendary item',
                'legendary_item_color',
                3,
                7,
            ],
            [
                6,
                'Epic item',
                'epic_item_color',
                4,
                7,
            ],
            [
                7,
                'Artifact',
                'artifact_item_color',
                5,
                8,
            ],
            [
                8,
                'Relic',
                'relic_item_color',
                6,
                8,
            ],
        ];
    }
}
