<?php

declare(strict_types=1);

namespace Item\Type\Weapon;

interface WeaponTypeInterface
{
    // One hand
    public const SWORD                = 1;
    public const AXE                  = 2;
    public const MACE                 = 3;
    public const DAGGER               = 4;
    public const SPEAR                = 5;
    public const WAND                 = 6;
    public const HEAVY_SWORD          = 7;
    public const HEAVY_AXE            = 8;
    public const HEAVY_MACE           = 9;

    // Two hand
    public const BOW                  = 20;
    public const STAFF                = 21;
    public const TWO_HAND_SWORD       = 22;
    public const TWO_HAND_AXE         = 23;
    public const TWO_HAND_MACE        = 24;
    public const TWO_HAND_HEAVY_SWORD = 25;
    public const TWO_HAND_HEAVY_AXE   = 26;
    public const TWO_HAND_HEAVY_MACE  = 27;
    public const LANCE                = 28;
    public const CROSSBOW             = 29;

    // Unarmed
    public const FIST                 = 100;
}
