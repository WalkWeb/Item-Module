<?php

declare(strict_types=1);

namespace Item\Material;

use Item\Material\Element\MaterialElementInterface;
use Item\Type\Material\MaterialTypeInterface;

interface MaterialInterface
{
    public function getName(): string;
    public function getIcon(): string;
    public function getType(): MaterialTypeInterface;
    public function getLevel(): int;
    public function getQuality(): float;
    public function getPrefix(): string;
    public function getSuffix(): string;
    public function getElement(): MaterialElementInterface;
}
