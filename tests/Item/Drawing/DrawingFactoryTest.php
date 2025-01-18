<?php

declare(strict_types=1);

namespace Tests\Item\Drawing;

use Item\Drawing\DrawingException;
use Item\Drawing\DrawingFactory;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class DrawingFactoryTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param array $data
     * @throws ItemException
     */
    public function testDrawingFactoryCreateSuccess(array $data): void
    {
        $drawing = DrawingFactory::create($data);

        self::assertEquals($data['id'], $drawing->getId());
        self::assertEquals($data['name'], $drawing->getName());
        self::assertEquals($data['icon'], $drawing->getIcon());
        self::assertEquals($data['price'], $drawing->getPrice());
        self::assertEquals($data['min_level'], $drawing->getMinLevel());
        self::assertEquals($data['type_id'], $drawing->getType()->getId());
    }

    /**
     * @dataProvider failDataProvider
     * @param array $data
     * @param string $error
     */
    public function testDrawingFactoryCreateFail(array $data, string $error): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage($error);
        DrawingFactory::create($data);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                [
                    'id'        => 143,
                    'name'      => 'Item Name',
                    'icon'      => 'icon.png',
                    'price'     => 1000,
                    'min_level' => 4,
                    'type_id'   => 1,
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
                    'name'      => 'Item Name',
                    'icon'      => 'icon.png',
                    'price'     => 1000,
                    'min_level' => 4,
                    'type_id'   => 1,
                ],
                DrawingException::INVALID_ID,
            ],
            // id invalid type
            [
                [
                    'id'        => null,
                    'name'      => 'Item Name',
                    'icon'      => 'icon.png',
                    'price'     => 1000,
                    'min_level' => 4,
                    'type_id'   => 1,
                ],
                DrawingException::INVALID_ID,
            ],
            // miss name
            [
                [
                    'id'        => 143,
                    'icon'      => 'icon.png',
                    'price'     => 1000,
                    'min_level' => 4,
                    'type_id'   => 1,
                ],
                DrawingException::INVALID_NAME,
            ],
            // name invalid type
            [
                [
                    'id'        => 143,
                    'name'      => true,
                    'icon'      => 'icon.png',
                    'price'     => 1000,
                    'min_level' => 4,
                    'type_id'   => 1,
                ],
                DrawingException::INVALID_NAME,
            ],
            // miss icon
            [
                [
                    'id'        => 143,
                    'name'      => 'Item Name',
                    'price'     => 1000,
                    'min_level' => 4,
                    'type_id'   => 1,
                ],
                DrawingException::INVALID_ICON,
            ],
            // icon invalid type
            [
                [
                    'id'        => 143,
                    'name'      => 'Item Name',
                    'icon'      => [],
                    'price'     => 1000,
                    'min_level' => 4,
                    'type_id'   => 1,
                ],
                DrawingException::INVALID_ICON,
            ],
            // miss price
            [
                [
                    'id'        => 143,
                    'name'      => 'Item Name',
                    'icon'      => 'icon.png',
                    'min_level' => 4,
                    'type_id'   => 1,
                ],
                DrawingException::INVALID_PRICE,
            ],
            // price invalid type
            [
                [
                    'id'        => 143,
                    'name'      => 'Item Name',
                    'icon'      => 'icon.png',
                    'price'     => 1000.56,
                    'min_level' => 4,
                    'type_id'   => 1,
                ],
                DrawingException::INVALID_PRICE,
            ],
            // miss min_level
            [
                [
                    'id'        => 143,
                    'name'      => 'Item Name',
                    'icon'      => 'icon.png',
                    'price'     => 1000,
                    'type_id'   => 1,
                ],
                DrawingException::INVALID_MIN_LEVEL,
            ],
            // min_level invalid type
            [
                [
                    'id'        => 143,
                    'name'      => 'Item Name',
                    'icon'      => 'icon.png',
                    'price'     => 1000,
                    'min_level' => '4',
                    'type_id'   => 1,
                ],
                DrawingException::INVALID_MIN_LEVEL,
            ],
            // miss type_id
            [
                [
                    'id'        => 143,
                    'name'      => 'Item Name',
                    'icon'      => 'icon.png',
                    'price'     => 1000,
                    'min_level' => 4,
                ],
                DrawingException::INVALID_TYPE_ID,
            ],
            // type_id invalid type
            [
                [
                    'id'        => 143,
                    'name'      => 'Item Name',
                    'icon'      => 'icon.png',
                    'price'     => 1000,
                    'min_level' => 4,
                    'type_id'   => null,
                ],
                DrawingException::INVALID_TYPE_ID,
            ],
        ];
    }
}
