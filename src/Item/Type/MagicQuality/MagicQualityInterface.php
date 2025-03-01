<?php

declare(strict_types=1);

namespace Item\Type\MagicQuality;

interface MagicQualityInterface
{
    public const COMMON    = 0;
    public const MAGIC     = 1;
    public const ENCHANTED = 2;
    public const RARE      = 3;
    public const MYSTICAL  = 4;
    public const LEGENDARY = 5;
    public const EPIC      = 6;
    public const ARTIFACT  = 7;
    public const RELIC     = 8;

    public function getId(): int;
    public function getName(): string;
    public function getClassColor(): string;
    public function getMinQuality(): int;
    public function getMaxQuality(): int;
}
