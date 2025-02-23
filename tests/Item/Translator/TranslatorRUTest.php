<?php

declare(strict_types=1);

namespace Tests\Item\Translator;

use Item\Translator\TranslatorRU;
use PHPUnit\Framework\TestCase;

class TranslatorRUTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param string $string
     * @param string $expectedString
     */
    public function testTranslatorRU(string $string, string $expectedString): void
    {
        self::assertEquals($expectedString, (new TranslatorRU())->trans($string));
    }

    public function successDataProvider(): array
    {
        return [
            [
                'offense.physicalDamage',
                'Физический урон',
            ],
            [
                'unknown string',
                'unknown string',
            ],
        ];
    }
}
