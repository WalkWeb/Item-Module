<?php

declare(strict_types=1);

namespace Item\Type\Equip;

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

    public const ONE_HAND       = 10;
    public const TWO_HAND       = 11;

    public function getId(): int;
    public function getName(): string;
}
