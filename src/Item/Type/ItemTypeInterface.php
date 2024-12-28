<?php

declare(strict_types=1);

namespace Item\Type;

interface ItemTypeInterface
{
    public const EQUIP    = 1;
    public const POTION   = 2;
    public const MATERIAL = 3;
    public const BOOK     = 4;

    public function getId(): int;
    public function getName(): string;
}
