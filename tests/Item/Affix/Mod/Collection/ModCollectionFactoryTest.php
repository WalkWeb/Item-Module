<?php

declare(strict_types=1);

namespace Tests\Item\Affix\Mod\Collection;

use Item\Affix\Mod\Collection\ModCollectionFactory;
use Item\Affix\Mod\ModException;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class ModCollectionFactoryTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param array $data
     * @throws ItemException
     */
    public function testModCollectionFactoryCreateSuccess(array $data): void
    {
        $collection = ModCollectionFactory::create($data);

        self::assertSameSize($data, $collection);

        $i = 0;
        foreach ($collection as $stat) {
            self::assertEquals($data[$i]['name'], $stat->getName());
            self::assertEquals($data[$i]['prefix'], $stat->getPrefix());
            self::assertEquals($data[$i]['suffix'], $stat->getSuffix());
            self::assertEquals($data[$i]['min_value'], $stat->getMinValue());
            self::assertEquals($data[$i]['max_value'], $stat->getMaxValue());
            $i++;
        }
    }

    /**
     * @dataProvider failDataProvider
     * @param array $data
     * @param string $error
     */
    public function testModCollectionFactoryCreateFail(array $data, string $error): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage($error);
        ModCollectionFactory::create($data);
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
                        'name'           => 'offense.attackSpeed',
                        'prefix'         => '+',
                        'suffix'         => '%',
                        'min_value'      => 10,
                        'max_value'      => 20,
                    ],
                    [
                        'name'           => 'offense.castSpeed',
                        'prefix'         => '+',
                        'suffix'         => '%',
                        'min_value'      => 10,
                        'max_value'      => 20,
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
                        'name'           => 'offense.attackSpeed',
                        'prefix'         => '+',
                        'suffix'         => '%',
                        'min_value'      => 10,
                        'max_value'      => 20,
                    ],
                    [
                        'name'           => 'offense.attackSpeed',
                        'prefix'         => '+',
                        'suffix'         => '%',
                        'min_value'      => 10,
                        'max_value'      => 20,
                    ],
                ],
                ModException::ALREADY_EXIST,
            ],
            // invalid data
            [
                [
                    [
                        'name'           => 'offense.attackSpeed',
                        'prefix'         => '+',
                        'suffix'         => '%',
                        'min_value'      => 10,
                        'max_value'      => 20,
                    ],
                    'string data',
                ],
                ModException::EXPECTED_ARRAY,
            ],
            // empty
            [
                [],
                ModException::EMPTY_MODS,
            ],
        ];
    }
}
