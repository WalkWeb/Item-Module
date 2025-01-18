<?php

declare(strict_types=1);

namespace Item\Drawing;

use Item\Type\ItemTypeInterface;

class Drawing implements DrawingInterface
{
    private int $id;
    private string $name;
    private string $icon;
    private int $price;
    private int $minLevel;
    private ItemTypeInterface $type;

    public function __construct(
        int $id,
        string $name,
        string $icon,
        int $price,
        int $minLevel,
        ItemTypeInterface $type
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->icon = $icon;
        $this->price = $price;
        $this->minLevel = $minLevel;
        $this->type = $type;
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
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getMinLevel(): int
    {
        return $this->minLevel;
    }

    /**
     * @return ItemTypeInterface
     */
    public function getType(): ItemTypeInterface
    {
        return $this->type;
    }
}
