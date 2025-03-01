<?php

declare(strict_types=1);

namespace Item\Material\Element;

use Item\ItemException;

class MaterialElement implements MaterialElementInterface
{
    private static array $map = [
        self::PHYSICAL => 'Physical',
        self::FIRE     => 'Fire',
        self::WATER    => 'Water',
        self::AIR      => 'Air',
        self::EARTH    => 'Earth',
        self::LIFE     => 'Life',
        self::DEATH    => 'Death',
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
            throw new ItemException(ItemException::UNKNOWN_MATERIAL_ELEMENT . ': ' . $id);
        }

        $this->name = self::$map[$id];
    }
}
