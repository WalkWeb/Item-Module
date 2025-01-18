<?php

declare(strict_types=1);

namespace Item\Drawing;

use Item\Type\ItemTypeInterface;

interface DrawingInterface
{
    public function getId(): int;
    public function getName(): string;
    public function getIcon(): string;
    public function getPrice(): int;
    public function getMinLevel(): int;
    public function getType(): ItemTypeInterface;
}
