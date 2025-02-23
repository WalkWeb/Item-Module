<?php

declare(strict_types=1);

namespace Item\Traits;

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
     * @return int|null
     * @throws ItemException
     */
    protected static function intOrNull(array $data, string $field, string $error): ?int
    {
        if (!array_key_exists($field, $data)) {
            throw new ItemException($error);
        }

        if (is_int($data[$field]) || $data[$field] === null) {
            return $data[$field];
        }

        throw new ItemException($error);
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

    /**
     * @param array $data
     * @param string $field
     * @param string $error
     * @return bool
     * @throws ItemException
     */
    protected static function bool(array $data, string $field, string $error): bool
    {
        if (!array_key_exists($field, $data) || !is_bool($data[$field])) {
            throw new ItemException($error);
        }

        return $data[$field];
    }

    /**
     * @param array $data
     * @param string $field
     * @param string $error
     * @return float|int
     * @throws ItemException
     */
    protected static function intOrFloat(array $data, string $field, string $error)
    {
        if (!array_key_exists($field, $data) || (!is_float($data[$field]) && !is_int($data[$field]))) {
            throw new ItemException($error);
        }

        return $data[$field];
    }

    /**
     * @param array $data
     * @param string $field
     * @param string $error
     * @return array
     * @throws ItemException
     */
    protected static function array(array $data, string $field, string $error): array
    {
        if (!array_key_exists($field, $data) || !is_array($data[$field])) {
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
    protected static function stat(array $data, string $field, string $error): string
    {
        $name = self::string($data, $field, $error);

        if (count(explode('.', $name)) !== 2) {
            throw new ItemException($error);
        }

        return $name;
    }
}
