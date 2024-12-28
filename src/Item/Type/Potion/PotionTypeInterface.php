<?php

declare(strict_types=1);

namespace Item\Type\Potion;

interface PotionTypeInterface
{
    public const LIFE    = 1;
    public const MANA    = 2;
    public const STAMINA = 3;
    public const HORROR  = 4;

    public function getId(): int;
    public function getName(): string;
}
