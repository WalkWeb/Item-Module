<?php

declare(strict_types=1);

namespace Item\Type\Quality;

interface QualityInterface
{
    public const BROKEN      = 0;
    public const LOW         = 1;
    public const RUDE        = 2;
    public const NORMAL      = 3;
    public const GOOD        = 4;
    public const QUALITATIVE = 5;
    public const EXCELLENT   = 6;
    public const FABULOUS    = 7;
    public const UNRIVALED   = 8;

    public function getId(): int;
    public function getValue(): float;
    public function getPrefix(): string;
}
