<?php

declare(strict_types=1);

namespace Item\Affix;

use Item\Affix\Mod\Collection\ModCollection;
use Item\Affix\Type\AffixTypeInterface;

interface AffixInterface
{
    public function getId(): int;
    public function getType(): AffixTypeInterface;
    public function getMinLevel(): int;
    public function getRequiredLevel(): int;
    public function getRarity(): int;
    public function isUnique(): bool;
    public function getPrice(): int;
    public function getMods(): ModCollection;
}
