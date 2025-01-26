<?php

declare(strict_types=1);

namespace Item\Drawing\Stat;

class Stat implements StatInterface
{
    private string $name;
    private $value;
    private bool $quality;
    private string $suffix;

    public function __construct(string $name, $value, bool $quality, string $suffix)
    {
        $this->name = $name;
        $this->value = $value;
        $this->quality = $quality;
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
     * @return float|int
     */
    public function getValue()
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
    public function getSuffix(): string
    {
        return $this->suffix;
    }
}
