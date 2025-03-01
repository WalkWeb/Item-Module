<?php

declare(strict_types=1);

namespace Tests\Item\Material\DataProvider;

use Exception;
use Item\ItemException;
use Item\Material\DataProvider\Wood;
use Item\Material\Element\MaterialElement;
use PHPUnit\Framework\TestCase;

class WoodTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param string $id
     * @param array $expected
     * @throws ItemException
     */
    public function testWoodGetSuccess(string $id, array $expected): void
    {
        $material = Wood::get($id);

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
    public function testWoodGetAll(): void
    {
        self::assertCount(15, Wood::getAll());
    }

    /**
     * @throws Exception
     */
    public function testWoodGetRandom(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $itemLevel = random_int(1, 25);
            $material = Wood::getRandom($itemLevel);
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
                'wood',
                [
                    'name'    => 'Wood',
                    'icon'    => '/icon/woods/woods.png',
                    'level'   => 1,
                    'quality' => 0.8,
                    'prefix'  => '',
                    'suffix'  => '',
                    'element' => MaterialElement::PHYSICAL,
                ],
            ],
        ];
    }
}
