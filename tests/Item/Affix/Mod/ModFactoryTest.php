<?php

declare(strict_types=1);

namespace Tests\Item\Affix\Mod;

use Item\Affix\Mod\ModException;
use Item\Affix\Mod\ModFactory;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class ModFactoryTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param array $data
     * @throws ItemException
     */
    public function testModFactoryCreateSuccess(array $data): void
    {
        $mod = ModFactory::create($data);

        self::assertEquals($data['name'], $mod->getName());
        self::assertEquals($data['prefix'], $mod->getPrefix());
        self::assertEquals($data['suffix'], $mod->getSuffix());
        self::assertEquals($data['min_value'], $mod->getMinValue());
        self::assertEquals($data['max_value'], $mod->getMaxValue());
    }

    /**
     * @dataProvider failDataProvider
     * @param array $data
     * @param string $error
     */
    public function testModFactoryCreateFail(array $data, string $error): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage($error);
        ModFactory::create($data);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                [
                    'name'           => 'offense.attackSpeed',
                    'prefix'         => '+',
                    'suffix'         => '%',
                    'min_value'      => 10,
                    'max_value'      => 20,
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
                    'prefix'         => '+',
                    'suffix'         => '%',
                    'min_value'      => 10,
                    'max_value'      => 20,
                ],
                ModException::INVALID_NAME,
            ],
            // name invalid type
            [
                [
                    'name'           => null,
                    'prefix'         => '+',
                    'suffix'         => '%',
                    'min_value'      => 10,
                    'max_value'      => 20,
                ],
                ModException::INVALID_NAME,
            ],
            // name invalid value
            [
                [
                    'name'           => 'offense',
                    'prefix'         => '+',
                    'suffix'         => '%',
                    'min_value'      => 10,
                    'max_value'      => 20,
                ],
                ModException::INVALID_NAME,
            ],
            // miss prefix
            [
                [
                    'name'           => 'offense.attackSpeed',
                    'suffix'         => '%',
                    'min_value'      => 10,
                    'max_value'      => 20,
                ],
                ModException::INVALID_PREFIX,
            ],
            // prefix invalid type
            [
                [
                    'name'           => 'offense.attackSpeed',
                    'prefix'         => 123,
                    'suffix'         => '%',
                    'min_value'      => 10,
                    'max_value'      => 20,
                ],
                ModException::INVALID_PREFIX,
            ],
            // miss suffix
            [
                [
                    'name'           => 'offense.attackSpeed',
                    'prefix'         => '+',
                    'min_value'      => 10,
                    'max_value'      => 20,
                ],
                ModException::INVALID_SUFFIX,
            ],
            // suffix invalid type
            [
                [
                    'name'           => 'offense.attackSpeed',
                    'prefix'         => '+',
                    'suffix'         => [],
                    'min_value'      => 10,
                    'max_value'      => 20,
                ],
                ModException::INVALID_SUFFIX,
            ],
            // miss min_value
            [
                [
                    'name'           => 'offense.attackSpeed',
                    'prefix'         => '+',
                    'suffix'         => '%',
                    'max_value'      => 20,
                ],
                ModException::INVALID_MIN_VALUE,
            ],
            // min_value invalid type
            [
                [
                    'name'           => 'offense.attackSpeed',
                    'prefix'         => '+',
                    'suffix'         => '%',
                    'min_value'      => true,
                    'max_value'      => 20,
                ],
                ModException::INVALID_MIN_VALUE,
            ],
            // miss max_value
            [
                [
                    'name'           => 'offense.attackSpeed',
                    'prefix'         => '+',
                    'suffix'         => '%',
                    'min_value'      => 10,
                ],
                ModException::INVALID_MAX_VALUE,
            ],
            // max_value invalid type
            [
                [
                    'name'           => 'offense.attackSpeed',
                    'prefix'         => '+',
                    'suffix'         => '%',
                    'min_value'      => 10,
                    'max_value'      => null,
                ],
                ModException::INVALID_MAX_VALUE,
            ],
        ];
    }
}
