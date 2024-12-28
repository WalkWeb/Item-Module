<?php

declare(strict_types=1);

namespace Item\Equip;

interface EquipTypeInterface
{
    public const RING           = 1;
    public const AMULET         = 2;
    public const HELMET         = 3;
    public const ARMOR          = 4;
    public const GLOVES         = 5;
    public const BOOTS          = 6;
    public const LEGS           = 7;
    public const SHOULDERS      = 8;
    public const SHIELD         = 9;

    public const SWORD          = 10;
    public const AXE            = 11;
    public const MACE           = 12;
    public const BOW            = 13;
    public const STAFF          = 14;
    public const DAGGER         = 15;

    public const TWO_HAND_SWORD = 16;
    public const TWO_HAND_AXE   = 17;
    public const TWO_HAND_MACE  = 18;

    public const CROSSBOW       = 19;

    public function getId(): int;
    public function getName(): string;
}
