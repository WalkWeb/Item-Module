<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\Stat;

use Item\Drawing\Stat\StatCollectionFactory;
use Item\Drawing\Stat\StatException;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class StatCollectionFactoryTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param array $data
     * @throws ItemException
     */
    public function testStatCollectionFactoryCreateSuccess(array $data): void
    {
        $collection = StatCollectionFactory::create($data);

        self::assertSameSize($data, $collection);

        $i = 0;
        foreach ($collection as $stat) {
            self::assertEquals($data[$i]['name'], $stat->getName());
            self::assertEquals($data[$i]['value'], $stat->getValue());
            self::assertEquals($data[$i]['quality'], $stat->isQuality());
            self::assertEquals($data[$i]['suffix'], $stat->getSuffix());
            $i++;
        }

        self::assertNull($collection->key());
    }

    /**
     * @dataProvider failDataProvider
     * @param array $data
     * @param string $error
     */
    public function testStatCollectionFactoryCreateFail(array $data, string $error): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage($error);
        StatCollectionFactory::create($data);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                [
                    [
                        'name'    => 'name-1',
                        'value'   => 10,
                        'quality' => true,
                        'suffix'  => '%',
                    ],
                    [
                        'name'    => 'name-2',
                        'value'   => 1.2,
                        'quality' => true,
                        'suffix'  => '',
                    ],
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
            // already exist
            [
                [
                    [
                        'name'    => 'name-1',
                        'value'   => 10,
                        'quality' => true,
                        'suffix'  => '%',
                    ],
                    [
                        'name'    => 'name-1',
                        'value'   => 1.2,
                        'quality' => true,
                        'suffix'  => '',
                    ],
                ],
                StatException::ALREADY_EXIST,
            ],
            // invalid data
            [
                [
                    [
                        'name'    => 'name-1',
                        'value'   => 10,
                        'quality' => true,
                        'suffix'  => '%',
                    ],
                    'string data',
                ],
                StatException::EXPECTED_ARRAY,
            ],
        ];
    }
}
