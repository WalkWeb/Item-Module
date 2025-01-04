<?php

declare(strict_types=1);

namespace Item\Traits;

use DateTime;
use DateTimeInterface;
use Exception;
use Item\ItemException;

trait ValidationTrait
{
    /**
     * @param array $data
     * @param string $field
     * @param string $error
     * @return int
     * @throws ItemException
     */
    protected static function int(array $data, string $field, string $error): int
    {
        if (!array_key_exists($field, $data) || !is_int($data[$field])) {
            throw new ItemException($error);
        }

        return $data[$field];
    }

    /**
     * @param array $data
     * @param string $field
     * @param string $error
     * @return string
     * @throws ItemException
     */
    protected static function string(array $data, string $field, string $error): string
    {
        if (!array_key_exists($field, $data) || !is_string($data[$field])) {
            throw new ItemException($error);
        }

        return $data[$field];
    }
}
