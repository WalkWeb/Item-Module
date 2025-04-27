<?php

declare(strict_types=1);

namespace Tests\Item\Material\Collection;

use Item\ItemException;
use Item\Material\Collection\MaterialCollectionFactory;
use Item\Material\Element\MaterialElement;
use Item\Material\MaterialException;
use Item\Type\Material\MaterialTypeInterface;
use PHPUnit\Framework\TestCase;

class MaterialCollectionFactoryTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param array $data
     * @throws ItemException
     */
    public function testMaterialCollectionFactoryCreateSuccess(array $data): void
    {
        $collection = MaterialCollectionFactory::create($data);

        self::assertSameSize($data, $collection);

        $i = 0;
        foreach ($collection as $material) {
            self::assertEquals($data[$i]['name'], $material->getName());
            self::assertEquals($data[$i]['icon'], $material->getIcon());
            self::assertEquals($data[$i]['type'], $material->getType()->getId());
            self::assertEquals($data[$i]['level'], $material->getLevel());
            self::assertEquals($data[$i]['quality'], $material->getQuality());
            self::assertEquals($data[$i]['prefix'], $material->getPrefix());
            self::assertEquals($data[$i]['suffix'], $material->getSuffix());
            self::assertEquals($data[$i]['element'], $material->getElement()->getId());

            $i++;
        }
    }

    /**
     * @dataProvider failDataProvider
     * @param array $data
     * @param string $error
     * @throws ItemException
     */
    public function testMaterialCollectionFactoryCreateFail(array $data, string $error): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage($error);
        MaterialCollectionFactory::create($data);
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
                        'name'    => 'copper',
                        'icon'    => '/icon/metals/copper.png',
                        'type'    => MaterialTypeInterface::METAL,
                        'level'   => 1,
                        'quality' => 0.8,
                        'prefix'  => 'prefix_copper',
                        'suffix'  => 'suffix_copper',
                        'element' => MaterialElement::PHYSICAL,
                    ],
                    [
                        'name'    => 'Iron',
                        'icon'    => '/icon/metals/iron.png',
                        'type'    => MaterialTypeInterface::METAL,
                        'level'   => 1,
                        'quality' => 1.0,
                        'prefix'  => 'iron',
                        'suffix'  => '',
                        'element' => MaterialElement::PHYSICAL,
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
            // double name
            [
                [
                    [
                        'name'    => 'copper',
                        'icon'    => '/icon/metals/copper.png',
                        'type'    => MaterialTypeInterface::METAL,
                        'level'   => 1,
                        'quality' => 0.8,
                        'prefix'  => 'prefix_copper',
                        'suffix'  => 'suffix_copper',
                        'element' => MaterialElement::PHYSICAL,
                    ],
                    [
                        'name'    => 'copper',
                        'icon'    => '/icon/metals/copper.png',
                        'type'    => MaterialTypeInterface::METAL,
                        'level'   => 1,
                        'quality' => 0.8,
                        'prefix'  => 'prefix_copper',
                        'suffix'  => 'suffix_copper',
                        'element' => MaterialElement::PHYSICAL,
                    ],
                ],
                MaterialException::ALREADY_EXIST,
            ],
            // invalid data
            [
                [
                    [
                        'name'    => 'copper',
                        'icon'    => '/icon/metals/copper.png',
                        'type'    => MaterialTypeInterface::METAL,
                        'level'   => 1,
                        'quality' => 0.8,
                        'prefix'  => 'prefix_copper',
                        'suffix'  => 'suffix_copper',
                        'element' => MaterialElement::PHYSICAL,
                    ],
                    123,
                ],
                MaterialException::EXPECTED_ARRAY,
            ],
        ];
    }
}
