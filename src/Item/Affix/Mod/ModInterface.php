<?php

declare(strict_types=1);

namespace Item\Affix\Mod;

interface ModInterface
{
    public function getName(): string;
    public function getPrefix(): string;
    public function getSuffix(): string;
    public function getMinValue(): int;
    public function getMaxValue(): int;
}
