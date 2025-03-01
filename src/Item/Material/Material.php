<?php

declare(strict_types=1);

namespace Item\Material;

use Item\Material\Element\MaterialElementInterface;

class Material implements MaterialInterface
{
    private string $name;
    private string $icon;
    private int $level;
    private float $quality;
    private string $prefix;
    private string $suffix;
    private MaterialElementInterface $element;

    public function __construct(
        string $name,
        string $icon,
        int $level,
        float $quality,
        string $prefix,
        string $suffix,
        MaterialElementInterface $element
    )
    {
        $this->name = $name;
        $this->icon = $icon;
        $this->level = $level;
        $this->quality = $quality;
        $this->prefix = $prefix;
        $this->suffix = $suffix;
        $this->element = $element;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getQuality(): float
    {
        return $this->quality;
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }

    public function getSuffix(): string
    {
        return $this->suffix;
    }

    public function getElement(): MaterialElementInterface
    {
        return $this->element;
    }
}
