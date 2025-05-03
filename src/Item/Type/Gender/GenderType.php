<?php

declare(strict_types=1);

namespace Item\Type\Gender;

use Item\ItemException;

class GenderType implements GenderTypeInterface
{
    private static array $map = [
        self::MALE     => 'male',
        self::FEMALE   => 'female',
        self::AVERAGE  => 'average',
        self::MULTIPLE => 'multiple',
    ];

    private static array $suffixMap = [
        self::MALE     => '_m',
        self::FEMALE   => '_f',
        self::AVERAGE  => '_n',
        self::MULTIPLE => '_p',
    ];

    private int $id;

    private string $name;

    /**
     * @param int $id
     * @throws ItemException
     */
    public function __construct(int $id)
    {
        $this->id = $id;
        $this->setName($id);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getSuffix(): string
    {
        return self::$suffixMap[$this->id];
    }

    /**
     * @param int $id
     * @throws ItemException
     */
    private function setName(int $id): void
    {
        if (!array_key_exists($id, self::$map)) {
            throw new ItemException(ItemException::UNKNOWN_GENDER_TYPE . ': ' . $id);
        }

        $this->name = self::$map[$id];
    }
}
