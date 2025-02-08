<?php

declare(strict_types=1);

namespace Item\Type\MagicQuality;

interface MagicQualityInterface
{
    public function getId(): int;
    public function getName(): string;
    public function getClassColor(): string;
    public function getMinQuality(): int;
    public function getMaxQuality(): int;
}
