<?php

declare(strict_types=1);

namespace Tests\Item\Material\DataProvider;

use Exception;
use Item\ItemException;
use Item\Material\DataProvider\Leather;
use Item\Material\Element\MaterialElement;
use PHPUnit\Framework\TestCase;

class LeatherTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param string $id
     * @param array $expected
     * @throws ItemException
     */
    public function testLeatherGetSuccess(string $id, array $expected): void
    {
        $material = Leather::get($id);

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
    public function testLeatherGetAll(): void
    {
        self::assertCount(22, Leather::getAll());
    }

    /**
     * @throws Exception
     */
    public function testLeatherGetRandom(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $itemLevel = random_int(1, 25);
            $material = Leather::getRandom($itemLevel);
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
                'wolf_leather',
                [
                    'name'    => 'Wolf Leather',
                    'icon'    => '/img/icon/leathers/leather_1.png',
                    'level'   => 1,
                    'quality' => 0.9,
                    'prefix'  => '',
                    'suffix'  => 'wolf_leather',
                    'element' => MaterialElement::PHYSICAL,
                ],
            ],
        ];
    }
}
