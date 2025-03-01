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
        self::assertEquals($data['prefix'], $stat->getPrefix());
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
                    'name'    => 'offense.criticalChance',
                    'value'   => 10,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
            ],
            [
                [
                    'name'    => 'offense.attackSpeed',
                    'value'   => 120,
                    'quality' => true,
                    'prefix'  => '+',
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
                    'prefix'  => '',
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
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                StatException::INVALID_NAME,
            ],
            // name invalid value
            [
                [
                    'name'    => 'name',
                    'value'   => 10,
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                StatException::INVALID_NAME,
            ],
            // miss value
            [
                [
                    'name'    => 'offense.attackSpeed',
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                StatException::INVALID_VALUE,
            ],
            // value invalid type
            [
                [
                    'name'    => 'offense.attackSpeed',
                    'value'   => '10.5',
                    'quality' => true,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                StatException::INVALID_VALUE,
            ],
            // miss quality
            [
                [
                    'name'   => 'offense.attackSpeed',
                    'value'  => 10,
                    'prefix'  => '',
                    'suffix' => '%',
                ],
                StatException::INVALID_QUALITY,
            ],
            // quality invalid type
            [
                [
                    'name'    => 'offense.attackSpeed',
                    'value'   => 10,
                    'quality' => 1,
                    'prefix'  => '',
                    'suffix'  => '%',
                ],
                StatException::INVALID_QUALITY,
            ],
            // miss prefix
            [
                [
                    'name'    => 'offense.attackSpeed',
                    'value'   => 120,
                    'quality' => true,
                    'suffix'  => '',
                ],
                StatException::INVALID_PREFIX,
            ],
            // prefix invalid type
            [
                [
                    'name'    => 'offense.attackSpeed',
                    'value'   => 120,
                    'quality' => true,
                    'prefix'  => 123,
                    'suffix'  => '',
                ],
                StatException::INVALID_PREFIX,
            ],
            // miss suffix
            [
                [
                    'name'    => 'offense.attackSpeed',
                    'value'   => 10,
                    'quality' => true,
                    'prefix'  => '',
                ],
                StatException::INVALID_SUFFIX,
            ],
            // suffix invalid type
            [
                [
                    'name'    => 'offense.attackSpeed',
                    'value'   => 10,
                    'quality' => true,
                    'suffix'  => [],
                    'prefix'  => '',
                ],
                StatException::INVALID_SUFFIX,
            ],
        ];
    }
}
