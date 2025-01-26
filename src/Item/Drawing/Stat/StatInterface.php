<?php

declare(strict_types=1);

namespace Item\Drawing\Stat;

interface StatInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return int|float
     */
    public function getValue();

    /**
     * @return bool
     */
    public function isQuality(): bool;

    /**
     * @return string
     */
    public function getSuffix(): string;
}
