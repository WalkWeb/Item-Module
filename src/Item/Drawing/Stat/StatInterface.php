<?php

declare(strict_types=1);

namespace Item\Drawing\Stat;

interface StatInterface
{
    public function getName(): string;
    public function getValue(): int;
    public function isQuality(): bool;
    public function getPrefix(): string;
    public function getSuffix(): string;
}
