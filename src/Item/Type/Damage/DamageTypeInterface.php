<?php

declare(strict_types=1);

namespace Item\Type\Damage;

interface DamageTypeInterface
{
    public const ATTACK = 1;
    public const SPELL  = 2;

    public function getId(): int;
    public function getName(): string;
}
