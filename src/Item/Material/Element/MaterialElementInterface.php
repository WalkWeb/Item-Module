<?php

declare(strict_types=1);

namespace Item\Material\Element;

interface MaterialElementInterface
{
    public const PHYSICAL = 1;
    public const FIRE     = 2;
    public const WATER    = 3;
    public const AIR      = 4;
    public const EARTH    = 5;
    public const LIFE     = 6;
    public const DEATH    = 7;

    public function getId(): int;
    public function getName(): string;
}
