<?php

declare(strict_types=1);

namespace Tests\Item\Material\DataProvider;

use Exception;
use Item\ItemException;
use Item\Material\DataProvider\Fabric;
use Item\Material\Element\MaterialElement;
use PHPUnit\Framework\TestCase;

class FabricTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param string $id
     * @param array $expected
     * @throws ItemException
     */
    public function testFabricGetSuccess(string $id, array $expected): void
    {
        $material = Fabric::get($id);

        self::assertEquals($expected['name'], $material->getName());
        self::assertEquals($expected['icon'], $material->getIcon());
        self::assertEquals($expected['level'], $material->getLevel());
        self::assertEquals($expected['quality'], $material->getQuality());
        self::assertEquals($expected['prefix'], $material->getPrefix());
        self::assertEquals($expected['suffix'], $material->getSuffix());
        self::assertEquals($expected['element'], $material->getElement()->getId());
    }

    /**
     * @throws ItemException
     */
    public function testFabricGetAll(): void
    {
        self::assertCount(11, Fabric::getAll());
    }

    /**
     * @throws Exception
     */
    public function testFabricGetRandom(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $itemLevel = random_int(1, 25);
            $material = Fabric::getRandom($itemLevel);
            self::assertTrue($material->getLevel() <= $itemLevel);
        }
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                'ajura_fabric',
                [
                    'name'    => 'Ajura Fabric',
                    'icon'    => '/img/icon/cloths/fabric_02.png',
                    'level'   => 1,
                    'quality' => 1.0,
                    'prefix'  => '',
                    'suffix'  => 'ajura_fabric',
                    'element' => MaterialElement::PHYSICAL,
                ],
            ],
        ];
    }
}
