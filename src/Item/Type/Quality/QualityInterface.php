<?php

declare(strict_types=1);

namespace Item\Type\Quality;

interface QualityInterface
{
    public function getId(): int;
    public function getValue(): float;
    public function getPrefix(): string;
}
