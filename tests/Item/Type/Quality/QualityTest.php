<?php

declare(strict_types=1);

namespace Tests\Item\Quality;

use Item\ItemException;
use Item\Type\Gender\GenderType;
use Item\Type\Gender\GenderTypeInterface;
use Item\Type\Quality\Quality;
use PHPUnit\Framework\TestCase;

class QualityTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param int $id
     * @param int $genderId
     * @param float $expectedValue
     * @param string $expectedPrefix
     * @throws ItemException
     */
    public function testQualityCreateSuccess(
        int $id,
        int $genderId,
        float $expectedValue,
        string $expectedPrefix
    ): void
    {
        $gender = new GenderType($genderId);

        $quality = new Quality($id, $gender);

        self::assertEquals($id, $quality->getId());
        self::assertEquals($expectedValue, $quality->getValue());
        self::assertEquals($expectedPrefix, $quality->getPrefix());
    }

    public function testQualityCreateFail(): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(ItemException::UNKNOWN_QUALITY_TYPE);
        new Quality(99, new GenderType(GenderTypeInterface::MALE));
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                0,
                GenderTypeInterface::MALE,
                0.7,
                'broken_m',
            ],
            [
                0,
                GenderTypeInterface::FEMALE,
                0.7,
                'broken_f',
            ],
            [
                0,
                GenderTypeInterface::AVERAGE,
                0.7,
                'broken_n',
            ],
            [
                0,
                GenderTypeInterface::MULTIPLE,
                0.7,
                'broken_p',
            ],
            [
                1,
                GenderTypeInterface::MALE,
                0.8,
                'low_quality_m',
            ],
            [
                2,
                GenderTypeInterface::MALE,
                0.9,
                'rude_m',
            ],
            [
                3,
                GenderTypeInterface::MALE,
                1.0,
                '',
            ],
            [
                4,
                GenderTypeInterface::MALE,
                1.1,
                'good_quality_m',
            ],
            [
                5,
                GenderTypeInterface::MALE,
                1.15,
                'qualitative_m',
            ],
            [
                6,
                GenderTypeInterface::MALE,
                1.2,
                'excellent_m',
            ],
            [
                7,
                GenderTypeInterface::MALE,
                1.25,
                'fabulous_m',
            ],
            [
                8,
                GenderTypeInterface::MALE,
                1.3,
                'unrivaled_m',
            ],
        ];
    }
}
