<?php

declare(strict_types=1);

namespace Item\Type\Gender;

interface GenderTypeInterface
{
    public const MALE     = 1;
    public const FEMALE   = 2;
    public const AVERAGE  = 3;
    public const MULTIPLE = 4;

    public function getId(): int;
    public function getName(): string;
    public function getSuffix(): string;
}
