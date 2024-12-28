<?php

declare(strict_types=1);

namespace Item\Type\Section;

interface SectionTypeInterface
{
    public const RIGHT_HAND = 1;
    public const LEFT_HAND  = 2;
    public const HELMET     = 3;
    public const ARMOR      = 4;
    public const GLOVES     = 5;
    public const BOOTS      = 6;
    public const AMULET     = 7;
    public const LEGS       = 8;
    public const RING       = 9;
    public const SHOULDERS  = 10;

    public function getId(): int;
    public function getName(): string;
}
