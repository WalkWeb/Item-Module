<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\Stat;

use Item\Drawing\Stat\StatException;
use Item\Drawing\Stat\StatFactory;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class StatFactoryTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param array $data
     * @throws ItemException
     */
    public function testStatFactoryCreateSuccess(array $data): void
    {
        $stat = StatFactory::create($data);

        self::assertEquals($data['name'], $stat->getName());
        self::assertEquals($data['value'], $stat->getValue());
        self::assertEquals($data['quality'], $stat->isQuality());
        self::assertEquals($data['suffix'], $stat->getSuffix());
    }

    /**
     * @dataProvider failDataProvider
     * @param array $data
     * @param string $error
     */
    public function testStatFactoryCreateFail(array $data, string $error): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage($error);
        StatFactory::create($data);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                [
                    'name'    => 'name',
                    'value'   => 10,
                    'quality' => true,
                    'suffix'  => '%',
                ],
            ],
            [
                [
                    'name'    => 'name',
                    'value'   => 1.2,
                    'quality' => true,
                    'suffix'  => '',
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function failDataProvider(): array
    {
        return [
            // miss name
            [
                [
                    'value'   => 10,
                    'quality' => true,
                    'suffix'  => '%',
                ],
                StatException::INVALID_NAME,
            ],
            // name invalid type
            [
                [
                    'name'    => null,
                    'value'   => 10,
                    'quality' => true,
                    'suffix'  => '%',
                ],
                StatException::INVALID_NAME,
            ],
            // miss value
            [
                [
                    'name'    => 'name',
                    'quality' => true,
                    'suffix'  => '%',
                ],
                StatException::INVALID_VALUE,
            ],
            // value invalid type
            [
                [
                    'name'    => 'name',
                    'value'   => '10.5',
                    'quality' => true,
                    'suffix'  => '%',
                ],
                StatException::INVALID_VALUE,
            ],
            // miss quality
            [
                [
                    'name'    => 'name',
                    'value'   => 10,
                    'suffix'  => '%',
                ],
                StatException::INVALID_QUALITY,
            ],
            // quality invalid type
            [
                [
                    'name'    => 'name',
                    'value'   => 10,
                    'quality' => 1,
                    'suffix'  => '%',
                ],
                StatException::INVALID_QUALITY,
            ],
            // miss suffix
            [
                [
                    'name'    => 'name',
                    'value'   => 10,
                    'quality' => true,
                ],
                StatException::INVALID_SUFFIX,
            ],
            // suffix invalid type
            [
                [
                    'name'    => 'name',
                    'value'   => 10,
                    'quality' => true,
                    'suffix'  => [],
                ],
                StatException::INVALID_SUFFIX,
            ],
        ];
    }
}
