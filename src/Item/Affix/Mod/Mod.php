<?php

declare(strict_types=1);

namespace Item\Affix\Mod;

class Mod implements ModInterface
{
    private string $name;
    private string $prefix;
    private string $suffix;
    private int $minValue;
    private int $maxValue;

    public function __construct(string $name, string $prefix, string $suffix, int $minValue, int $maxValue)
    {
        $this->name = $name;
        $this->prefix = $prefix;
        $this->suffix = $suffix;
        $this->minValue = $minValue;
        $this->maxValue = $maxValue;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }

    public function getSuffix(): string
    {
        return $this->suffix;
    }

    public function getMinValue(): int
    {
        return $this->minValue;
    }

    public function getMaxValue(): int
    {
        return $this->maxValue;
    }
}
