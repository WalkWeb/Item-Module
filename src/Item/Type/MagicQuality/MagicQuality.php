<?php

declare(strict_types=1);

namespace Item\Type\MagicQuality;

use Item\ItemException;

class MagicQuality implements MagicQualityInterface
{
    private static array $map = [
        0 => [
            'name'        => 'Common item',
            'class_color' => 'common_item_color',
            'quality'     => [
                'min' => 0,
                'max' => 6,
            ],
        ],
        1 => [
            'name'        => 'Magic item',
            'class_color' => 'magic_item_color',
            'quality'     => [
                'min' => 0,
                'max' => 6,
            ],
        ],
        2 => [
            'name'        => 'Enchanted item',
            'class_color' => 'enchanted_item_color',
            'quality'     => [
                'min' => 1,
                'max' => 6,
            ],
        ],
        3 => [
            'name'        => 'Rare item',
            'class_color' => 'rare_item_color',
            'quality'     => [
                'min' => 2,
                'max' => 6,
            ],
        ],
        4 => [
            'name'        => 'Mystical item',
            'class_color' => 'mystic_item_color',
            'quality'     => [
                'min' => 3,
                'max' => 7,
            ],
        ],
        5 => [
            'name'        => 'Legendary item',
            'class_color' => 'legendary_item_color',
            'quality'     => [
                'min' => 3,
                'max' => 7,
            ],
        ],
        6 => [
            'name'        => 'Epic item',
            'class_color' => 'epic_item_color',
            'quality'     => [
                'min' => 4,
                'max' => 7,
            ],
        ],
        7 => [
            'name'        => 'Artifact',
            'class_color' => 'artifact_item_color',
            'quality'     => [
                'min' => 5,
                'max' => 8,
            ],
        ],
        8 => [
            'name'        => 'Relic',
            'class_color' => 'relic_item_color',
            'quality'     => [
                'min' => 6,
                'max' => 8,
            ],
        ],
    ];

    private int $id;
    private string $name;
    private string $classColor;
    private int $minQuality;
    private int $maxQuality;

    /**
     * @param int $id
     * @throws ItemException
     */
    public function __construct(int $id)
    {
        if (!array_key_exists($id, self::$map)) {
            throw new ItemException(ItemException::UNKNOWN_MAGIC_QUALITY_TYPE);
        }

        $this->id = $id;

        $params = self::$map[$id];

        // todo translate
        $this->name = $params['name'];
        $this->classColor = $params['class_color'];
        $this->minQuality = $params['quality']['min'];
        $this->maxQuality = $params['quality']['max'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getClassColor(): string
    {
        return $this->classColor;
    }

    public function getMinQuality(): int
    {
        return $this->minQuality;
    }

    public function getMaxQuality(): int
    {
        return $this->maxQuality;
    }
}
