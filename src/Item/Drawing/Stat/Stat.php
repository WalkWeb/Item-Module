<?php

declare(strict_types=1);

namespace Item\Drawing\Stat;

class Stat implements StatInterface
{
    private string $name;
    private int $value;
    private bool $quality;
    private string $prefix;
    private string $suffix;

    public function __construct(string $name, int $value, bool $quality, string $prefix, string $suffix)
    {
        $this->name = $name;
        $this->value = $value;
        $this->quality = $quality;
        $this->prefix = $prefix;
        $this->suffix = $suffix;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isQuality(): bool
    {
        return $this->quality;
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * @return string
     */
    public function getSuffix(): string
    {
        return $this->suffix;
    }
}
