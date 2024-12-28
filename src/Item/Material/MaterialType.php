<?php

declare(strict_types=1);

namespace Item\Material;

use Item\ItemException;

class MaterialType implements MaterialTypeInterface
{
    private static array $map = [
        self::METAL   => 'metal',
        self::WOOD    => 'wood',
        self::LEATHER => 'leather',
        self::CLOTH   => 'cloth',
    ];

    private int $id;

    private string $name;

    /**
     * @param int $id
     * @throws ItemException
     */
    public function __construct(int $id)
    {
        $this->id = $id;
        $this->setName($id);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param int $id
     * @throws ItemException
     */
    private function setName(int $id): void
    {
        if (!array_key_exists($id, self::$map)) {
            throw new ItemException(ItemException::UNKNOWN_MATERIAL_TYPE . ': ' . $id);
        }

        $this->name = self::$map[$id];
    }
}
