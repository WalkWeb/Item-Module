<?php

declare(strict_types=1);

namespace Tests\Item\Material;

use Item\ItemException;
use Item\Material\Element\MaterialElement;
use Item\Material\MaterialException;
use Item\Material\MaterialFactory;
use Item\Type\Material\MaterialTypeInterface;
use PHPUnit\Framework\TestCase;

class MaterialFactoryTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param array $data
     * @throws ItemException
     */
    public function testMaterialFactoryCreateSuccess(array $data): void
    {
        $material = MaterialFactory::create($data);

        self::assertEquals($data['name'], $material->getName());
        self::assertEquals($data['icon'], $material->getIcon());
        self::assertEquals($data['type'], $material->getType()->getId());
        self::assertEquals($data['level'], $material->getLevel());
        self::assertEquals($data['quality'], $material->getQuality());
        self::assertEquals($data['prefix'], $material->getPrefix());
        self::assertEquals($data['suffix'], $material->getSuffix());
        self::assertEquals($data['element'], $material->getElement()->getId());
    }

    /**
     * @dataProvider failDataProvider
     * @param array $data
     * @param string $error
     * @throws ItemException
     */
    public function testMaterialFactoryCreateFail(array $data, string $error): void
    {
        $this->expectException(ItemException::class);
        $this->expectExceptionMessage($error);
        MaterialFactory::create($data);
    }

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                [
                    'name'    => 'copper',
                    'icon'    => '/img/icon/metals/copper.png',
                    'type'    => MaterialTypeInterface::METAL,
                    'level'   => 1,
                    'quality' => 0.8,
                    'prefix'  => 'prefix_copper',
                    'suffix'  => 'suffix_copper',
                    'element' => MaterialElement::PHYSICAL,
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
                    'icon'    => '/img/icon/metals/copper.png',
                    'level'   => 1,
                    'type'    => MaterialTypeInterface::METAL,
                    'quality' => 0.8,
                    'prefix'  => 'prefix_copper',
                    'suffix'  => 'suffix_copper',
                    'element' => MaterialElement::PHYSICAL,
                ],
                MaterialException::INVALID_NAME,
            ],
            // name invalid type
            [
                [
                    'name'    => null,
                    'icon'    => '/img/icon/metals/copper.png',
                    'type'    => MaterialTypeInterface::METAL,
                    'level'   => 1,
                    'quality' => 0.8,
                    'prefix'  => 'prefix_copper',
                    'suffix'  => 'suffix_copper',
                    'element' => MaterialElement::PHYSICAL,
                ],
                MaterialException::INVALID_NAME,
            ],
            // miss icon
            [
                [
                    'name'    => 'copper',
                    'type'    => MaterialTypeInterface::METAL,
                    'level'   => 1,
                    'quality' => 0.8,
                    'prefix'  => 'prefix_copper',
                    'suffix'  => 'suffix_copper',
                    'element' => MaterialElement::PHYSICAL,
                ],
                MaterialException::INVALID_ICON,
            ],
            // icon invalid type
            [
                [
                    'name'    => 'copper',
                    'icon'    => 100,
                    'type'    => MaterialTypeInterface::METAL,
                    'level'   => 1,
                    'quality' => 0.8,
                    'prefix'  => 'prefix_copper',
                    'suffix'  => 'suffix_copper',
                    'element' => MaterialElement::PHYSICAL,
                ],
                MaterialException::INVALID_ICON,
            ],
            // miss type
            [
                [
                    'name'    => 'copper',
                    'icon'    => '/img/icon/metals/copper.png',
                    'level'   => 1,
                    'quality' => 0.8,
                    'prefix'  => 'prefix_copper',
                    'suffix'  => 'suffix_copper',
                    'element' => MaterialElement::PHYSICAL,
                ],
                MaterialException::INVALID_TYPE,
            ],
            // type invalid type
            [
                [
                    'name'    => 'copper',
                    'icon'    => '/img/icon/metals/copper.png',
                    'type'    => [],
                    'level'   => 1,
                    'quality' => 0.8,
                    'prefix'  => 'prefix_copper',
                    'suffix'  => 'suffix_copper',
                    'element' => MaterialElement::PHYSICAL,
                ],
                MaterialException::INVALID_TYPE,
            ],
            // miss level
            [
                [
                    'name'    => 'copper',
                    'icon'    => '/img/icon/metals/copper.png',
                    'type'    => MaterialTypeInterface::METAL,
                    'quality' => 0.8,
                    'prefix'  => 'prefix_copper',
                    'suffix'  => 'suffix_copper',
                    'element' => MaterialElement::PHYSICAL,
                ],
                MaterialException::INVALID_LEVEL,
            ],
            // level invalid type
            [
                [
                    'name'    => 'copper',
                    'icon'    => '/img/icon/metals/copper.png',
                    'type'    => MaterialTypeInterface::METAL,
                    'level'   => true,
                    'quality' => 0.8,
                    'prefix'  => 'prefix_copper',
                    'suffix'  => 'suffix_copper',
                    'element' => MaterialElement::PHYSICAL,
                ],
                MaterialException::INVALID_LEVEL,
            ],
            // miss quality
            [
                [
                    'name'    => 'copper',
                    'icon'    => '/img/icon/metals/copper.png',
                    'type'    => MaterialTypeInterface::METAL,
                    'level'   => 1,
                    'prefix'  => 'prefix_copper',
                    'suffix'  => 'suffix_copper',
                    'element' => MaterialElement::PHYSICAL,
                ],
                MaterialException::INVALID_QUALITY,
            ],
            // quality invalid type
            [
                [
                    'name'    => 'copper',
                    'icon'    => '/img/icon/metals/copper.png',
                    'type'    => MaterialTypeInterface::METAL,
                    'level'   => 1,
                    'quality' => 123,
                    'prefix'  => 'prefix_copper',
                    'suffix'  => 'suffix_copper',
                    'element' => MaterialElement::PHYSICAL,
                ],
                MaterialException::INVALID_QUALITY,
            ],
            // miss prefix
            [
                [
                    'name'    => 'copper',
                    'icon'    => '/img/icon/metals/copper.png',
                    'type'    => MaterialTypeInterface::METAL,
                    'level'   => 1,
                    'quality' => 0.8,
                    'suffix'  => 'suffix_copper',
                    'element' => MaterialElement::PHYSICAL,
                ],
                MaterialException::INVALID_PREFIX,
            ],
            // prefix invalid type
            [
                [
                    'name'    => 'copper',
                    'icon'    => '/img/icon/metals/copper.png',
                    'type'    => MaterialTypeInterface::METAL,
                    'level'   => 1,
                    'quality' => 0.8,
                    'prefix'  => null,
                    'suffix'  => 'suffix_copper',
                    'element' => MaterialElement::PHYSICAL,
                ],
                MaterialException::INVALID_PREFIX,
            ],
            // miss suffix
            [
                [
                    'name'    => 'copper',
                    'icon'    => '/img/icon/metals/copper.png',
                    'type'    => MaterialTypeInterface::METAL,
                    'level'   => 1,
                    'quality' => 0.8,
                    'prefix'  => 'prefix_copper',
                    'element' => MaterialElement::PHYSICAL,
                ],
                MaterialException::INVALID_SUFFIX,
            ],
            // suffix invalid type
            [
                [
                    'name'    => 'copper',
                    'icon'    => '/img/icon/metals/copper.png',
                    'type'    => MaterialTypeInterface::METAL,
                    'level'   => 1,
                    'quality' => 0.8,
                    'prefix'  => 'prefix_copper',
                    'suffix'  => false,
                    'element' => MaterialElement::PHYSICAL,
                ],
                MaterialException::INVALID_SUFFIX,
            ],
            // miss element
            [
                [
                    'name'    => 'copper',
                    'icon'    => '/img/icon/metals/copper.png',
                    'type'    => MaterialTypeInterface::METAL,
                    'level'   => 1,
                    'quality' => 0.8,
                    'prefix'  => 'prefix_copper',
                    'suffix'  => 'suffix_copper',
                ],
                MaterialException::INVALID_ELEMENT,
            ],
            // element invalid type
            [
                [
                    'name'    => 'copper',
                    'icon'    => '/img/icon/metals/copper.png',
                    'type'    => MaterialTypeInterface::METAL,
                    'level'   => 1,
                    'quality' => 0.8,
                    'prefix'  => 'prefix_copper',
                    'suffix'  => 'suffix_copper',
                    'element' => null,
                ],
                MaterialException::INVALID_ELEMENT,
            ],
        ];
    }
}
