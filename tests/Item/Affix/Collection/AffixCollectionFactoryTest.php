<?php

declare(strict_types=1);

namespace Tests\Item\Affix\Collection;

use Item\Affix\AffixException;
use Item\Affix\Collection\AffixCollectionFactory;
use Item\Affix\Type\AffixType;
use Item\Affix\Type\AffixTypeInterface;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class AffixCollectionFactoryTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param array $data
     * @throws ItemException
     */
    public function testAffixCollectionFactoryCreateSuccess(array $data): void
    {
        $collection = AffixCollectionFactory::create($data);

        self::assertSameSize($data, $collection);

        $i = 0;
        foreach ($collection as $affix) {
            self::assertEquals($data[$i]['id'], $affix->getId());
            self::assertEquals(new AffixType($data[$i]['type_id']), $affix->getType());
            self::assertEquals($data[$i]['min_level'], $affix->getMinLevel());
            self::assertEquals($data[$i]['required_level'], $affix->getRequiredLevel());
            self::assertEquals($data[$i]['rarity'], $affix->getRarity());
            self::assertEquals($data[$i]['price'], $affix->getPrice());
            self::assertSameSize($data[$i]['mods'], $affix->getMods());
            $i++;
        }

        self::assertNull($collection->key());
    }

    /**
     * @dataProvider failDataProvider
     * @param array $data
     * @param string $error
     */
    public function testAffixCollectionFactoryCreateFail(array $data, string $error): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage($error);
        AffixCollectionFactory::create($data);
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
                        'id'             => 12,
                        'type_id'        => AffixTypeInterface::INCREASE_ATTACK_SPEED,
                        'min_level'      => 10,
                        'required_level' => 7,
                        'rarity'         => 100,
                        'price'          => 500,
                        'mods'           => [
                            [
                                'name'      => 'offense.attackSpeed',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 10,
                                'max_value' => 20,
                            ],
                        ],
                    ],
                    [
                        'id'             => 0,
                        'type_id'        => AffixTypeInterface::ADD_LIFE,
                        'min_level'      => 1,
                        'required_level' => 1,
                        'rarity'         => 100,
                        'price'          => 60,
                        'mods'           => [
                            [
                                'name'      => 'base.life',
                                'prefix'    => '+',
                                'suffix'    => '',
                                'min_value' => 5,
                                'max_value' => 10,
                            ],
                        ],
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
                        'id'             => 12,
                        'type_id'        => AffixTypeInterface::INCREASE_ATTACK_SPEED,
                        'min_level'      => 10,
                        'required_level' => 7,
                        'rarity'         => 100,
                        'price'          => 500,
                        'mods'           => [
                            [
                                'name'      => 'offense.attackSpeed',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 10,
                                'max_value' => 20,
                            ],
                        ],
                    ],
                    [
                        'id'             => 12,
                        'type_id'        => AffixTypeInterface::ADD_LIFE,
                        'min_level'      => 1,
                        'required_level' => 1,
                        'rarity'         => 100,
                        'price'          => 60,
                        'mods'           => [
                            [
                                'name'      => 'base.life',
                                'prefix'    => '+',
                                'suffix'    => '',
                                'min_value' => 5,
                                'max_value' => 10,
                            ],
                        ],
                    ],
                ],
                AffixException::ALREADY_EXIST,
            ],
            // invalid data
            [
                [
                    [
                        'id'             => 12,
                        'type_id'        => AffixTypeInterface::INCREASE_ATTACK_SPEED,
                        'min_level'      => 10,
                        'required_level' => 7,
                        'rarity'         => 100,
                        'price'          => 500,
                        'mods'           => [
                            [
                                'name'      => 'offense.attackSpeed',
                                'prefix'    => '+',
                                'suffix'    => '%',
                                'min_value' => 10,
                                'max_value' => 20,
                            ],
                        ],
                    ],
                    'string data',
                ],
                AffixException::EXPECTED_ARRAY,
            ],
        ];
    }
}
