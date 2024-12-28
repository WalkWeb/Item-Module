<?php

declare(strict_types=1);

namespace Item\Type\Section;

use Item\ItemException;

class SectionType implements SectionTypeInterface
{
    private static array $map = [
        self::RIGHT_HAND => 'right hand',
        self::LEFT_HAND  => 'left hand',
        self::HELMET     => 'helmet',
        self::ARMOR      => 'armor',
        self::GLOVES     => 'gloves',
        self::BOOTS      => 'boots',
        self::AMULET     => 'amulet',
        self::LEGS       => 'legs',
        self::RING       => 'ring',
        self::SHOULDERS  => 'shoulders',
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
            throw new ItemException(ItemException::UNKNOWN_SECTION_TYPE . ': ' . $id);
        }

        $this->name = self::$map[$id];
    }
}
