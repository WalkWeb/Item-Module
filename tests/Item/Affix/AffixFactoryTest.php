<?php

declare(strict_types=1);

namespace Tests\Item\Affix;

use Item\Affix\AffixException;
use Item\Affix\AffixFactory;
use Item\Affix\Type\AffixType;
use Item\Affix\Type\AffixTypeInterface;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class AffixFactoryTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param array $data
     * @throws ItemException
     */
    public function testAffixFactoryCreateSuccess(array $data): void
    {
        $affix = AffixFactory::create($data);

        self::assertEquals($data['id'], $affix->getId());
        self::assertEquals(new AffixType($data['type_id']), $affix->getType());
        self::assertEquals($data['min_level'], $affix->getMinLevel());
        self::assertEquals($data['required_level'], $affix->getRequiredLevel());
        self::assertEquals($data['rarity'], $affix->getRarity());
        self::assertEquals($data['rarity'] < 100, $affix->isUnique());
        self::assertEquals($data['price'], $affix->getPrice());

        self::assertSameSize($data['mods'], $affix->getMods());

        $i = 0;
        foreach ($affix->getMods() as $mod) {
            self::assertEquals($data['mods'][$i]['name'], $mod->getName());
            self::assertEquals($data['mods'][$i]['prefix'], $mod->getPrefix());
            self::assertEquals($data['mods'][$i]['suffix'], $mod->getSuffix());
            self::assertEquals($data['mods'][$i]['min_value'], $mod->getMinValue());
            self::assertEquals($data['mods'][$i]['max_value'], $mod->getMaxValue());

            $i++;
        }
    }

    /**
     * @dataProvider failDataProvider
     * @param array $data
     * @param string $error
     */
    public function testAffixFactoryCreateFail(array $data, string $error): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage($error);
        AffixFactory::create($data);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
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
                        [
                            'name'      => 'offense.castSpeed',
                            'prefix'    => '+',
                            'suffix'    => '%',
                            'min_value' => 30,
                            'max_value' => 40,
                        ],
                    ],
                ],
            ],
            // unique
            [
                [
                    'id'             => 278,
                    'type_id'        => AffixTypeInterface::ADD_LIFE_REGEN,
                    'min_level'      => 8,
                    'required_level' => 7,
                    'rarity'         => 40,
                    'price'          => 960,
                    'mods'           => [
                        [
                            'name'      => 'base.lifeRegen',
                            'prefix'    => '+',
                            'suffix'    => '',
                            'min_value' => 1,
                            'max_value' => 1,
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
            // miss id
            [
                [
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
                AffixException::INVALID_ID,
            ],
            // id invalid type
            [
                [
                    'id'             => null,
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
                AffixException::INVALID_ID,
            ],
            // miss type_id
            [
                [
                    'id'             => 12,
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
                AffixException::INVALID_TYPE_ID,
            ],
            // type_id invalid type
            [
                [
                    'id'             => 12,
                    'type_id'        => '75',
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
                AffixException::INVALID_TYPE_ID,
            ],
            // miss min_level
            [
                [
                    'id'             => 12,
                    'type_id'        => AffixTypeInterface::INCREASE_ATTACK_SPEED,
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
                AffixException::INVALID_MIN_LEVEL,
            ],
            // min_level invalid type
            [
                [
                    'id'             => 12,
                    'type_id'        => AffixTypeInterface::INCREASE_ATTACK_SPEED,
                    'min_level'      => true,
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
                AffixException::INVALID_MIN_LEVEL,
            ],
            // miss required_level
            [
                [
                    'id'        => 12,
                    'type_id'   => AffixTypeInterface::INCREASE_ATTACK_SPEED,
                    'min_level' => 10,
                    'rarity'    => 100,
                    'price'     => 500,
                    'mods'      => [
                        [
                            'name'      => 'offense.attackSpeed',
                            'prefix'    => '+',
                            'suffix'    => '%',
                            'min_value' => 10,
                            'max_value' => 20,
                        ],
                    ],
                ],
                AffixException::INVALID_REQUIRED_LEVEL,
            ],
            // required_level invalid type
            [
                [
                    'id'             => 12,
                    'type_id'        => AffixTypeInterface::INCREASE_ATTACK_SPEED,
                    'min_level'      => 10,
                    'required_level' => null,
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
                AffixException::INVALID_REQUIRED_LEVEL,
            ],
            // miss rarity
            [
                [
                    'id'             => 12,
                    'type_id'        => AffixTypeInterface::INCREASE_ATTACK_SPEED,
                    'min_level'      => 10,
                    'required_level' => 7,
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
                AffixException::INVALID_RARITY,
            ],
            // rarity invalid type
            [
                [
                    'id'             => 12,
                    'type_id'        => AffixTypeInterface::INCREASE_ATTACK_SPEED,
                    'min_level'      => 10,
                    'required_level' => 7,
                    'rarity'         => null,
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
                AffixException::INVALID_RARITY,
            ],
            // miss price
            [
                [
                    'id'             => 12,
                    'type_id'        => AffixTypeInterface::INCREASE_ATTACK_SPEED,
                    'min_level'      => 10,
                    'required_level' => 7,
                    'rarity'         => 100,
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
                AffixException::INVALID_PRICE,
            ],
            // price invalid type
            [
                [
                    'id'             => 12,
                    'type_id'        => AffixTypeInterface::INCREASE_ATTACK_SPEED,
                    'min_level'      => 10,
                    'required_level' => 7,
                    'rarity'         => 100,
                    'price'          => null,
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
                AffixException::INVALID_PRICE,
            ],
            // miss mods
            [
                [
                    'id'             => 12,
                    'type_id'        => AffixTypeInterface::INCREASE_ATTACK_SPEED,
                    'min_level'      => 10,
                    'required_level' => 7,
                    'rarity'         => 100,
                    'price'          => 500,
                ],
                AffixException::INVALID_MODS,
            ],
            // mods invalid type
            [
                [
                    'id'             => 12,
                    'type_id'        => AffixTypeInterface::INCREASE_ATTACK_SPEED,
                    'min_level'      => 10,
                    'required_level' => 7,
                    'rarity'         => 100,
                    'price'          => 500,
                    'mods'           => 'data',
                ],
                AffixException::INVALID_MODS,
            ],
        ];
    }
}
