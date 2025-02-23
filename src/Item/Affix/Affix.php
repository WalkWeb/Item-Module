<?php

declare(strict_types=1);

namespace Item\Affix;

use Item\Affix\Mod\Collection\ModCollection;
use Item\Affix\Type\AffixTypeInterface;

class Affix implements AffixInterface
{
    private int $id;
    private AffixTypeInterface $type;
    private int $minLevel;
    private int $requiredLevel;
    private int $rarity;
    private bool $unique;
    private int $price;
    private ModCollection $mods;

    public function __construct(
        int $id,
        AffixTypeInterface $type,
        int $minLevel,
        int $requiredLevel,
        int $rarity,
        int $price,
        ModCollection $mods
    )
    {
        $this->id = $id;
        $this->type = $type;
        $this->minLevel = $minLevel;
        $this->requiredLevel = $requiredLevel;
        $this->rarity = $rarity;
        $this->unique = $rarity < 100;
        $this->price = $price;
        $this->mods = $mods;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): AffixTypeInterface
    {
        return $this->type;
    }

    public function getMinLevel(): int
    {
        return $this->minLevel;
    }

    public function getRequiredLevel(): int
    {
        return $this->requiredLevel;
    }

    public function getRarity(): int
    {
        return $this->rarity;
    }

    public function isUnique(): bool
    {
        return $this->unique;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getMods(): ModCollection
    {
        return $this->mods;
    }
}
