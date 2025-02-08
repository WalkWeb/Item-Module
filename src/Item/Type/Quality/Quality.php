<?php

declare(strict_types=1);

namespace Item\Type\Quality;

use Item\ItemException;
use Item\Type\Gender\GenderTypeInterface;

class Quality implements QualityInterface
{
    private static array $map = [
        0 => [
            'value'     => 0.7,
            'masculine' => 'broken_m',
            'feminine'  => 'broken_f',
            'neuter'    => 'broken_n',
            'plural'    => 'broken_p',
        ],
        1 => [
            'value'     => 0.8,
            'masculine' => 'low_quality_m',
            'feminine'  => 'low_quality_f',
            'neuter'    => 'low_quality_n',
            'plural'    => 'low_quality_p',
        ],
        2 => [
            'value'     => 0.9,
            'masculine' => 'rude_m',
            'feminine'  => 'rude_f',
            'neuter'    => 'rude_n',
            'plural'    => 'rude_p',
        ],
        3 => [
            'value'     => 1,
            'masculine' => '',
            'feminine'  => '',
            'neuter'    => '',
            'plural'    => '',
        ],
        4 => [
            'value'     => 1.1,
            'masculine' => 'good_quality_m',
            'feminine'  => 'good_quality_f',
            'neuter'    => 'good_quality_n',
            'plural'    => 'good_quality_p',
        ],
        5 => [
            'value'     => 1.15,
            'masculine' => 'qualitative_m',
            'feminine'  => 'qualitative_f',
            'neuter'    => 'qualitative_n',
            'plural'    => 'qualitative_p',
        ],
        6 => [
            'value'     => 1.2,
            'masculine' => 'excellent_m',
            'feminine'  => 'excellent_f',
            'neuter'    => 'excellent_n',
            'plural'    => 'excellent_p',
        ],
        7 => [
            'value'     => 1.25,
            'masculine' => 'fabulous_m',
            'feminine'  => 'fabulous_f',
            'neuter'    => 'fabulous_n',
            'plural'    => 'fabulous_p',
        ],
        8 => [
            'value'     => 1.3,
            'masculine' => 'unrivaled_m',
            'feminine'  => 'unrivaled_f',
            'neuter'    => 'unrivaled_n',
            'plural'    => 'unrivaled_p',
        ],
    ];

    private int $id;
    private float $value;
    private string $prefix;

    /**
     * @param int $id
     * @param GenderTypeInterface $gender
     * @throws ItemException
     */
    public function __construct(int $id, GenderTypeInterface $gender)
    {
        if (!array_key_exists($id, self::$map)) {
            throw new ItemException(ItemException::UNKNOWN_QUALITY_TYPE);
        }

        $this->id = $id;

        $params = self::$map[$id];

        $this->value = $params['value'];

        // todo translate
        switch ($gender->getId()) {
            case GenderTypeInterface::MALE:
                $this->prefix = $params['masculine'];
                break;
            case GenderTypeInterface::FEMALE:
                $this->prefix = $params['feminine'];
                break;
            case GenderTypeInterface::AVERAGE:
                $this->prefix = $params['neuter'];
                break;
            case GenderTypeInterface::MULTIPLE:
                $this->prefix = $params['plural'];
                break;
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }
}
