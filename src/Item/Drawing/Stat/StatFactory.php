<?php

declare(strict_types=1);

namespace Item\Drawing\Stat;

use Item\Drawing\DrawingInterface;
use Item\ItemException;
use Item\ItemInterface;
use Item\Material\Element\MaterialElementInterface;
use Item\Material\MaterialInterface;
use Item\Traits\ValidationTrait;
use Item\Type\Armor\ArmorTypeInterface;
use Item\Type\Section\SectionTypeInterface;

class StatFactory
{
    use ValidationTrait;

    /**
     * @param array $data
     * @return StatInterface
     * @throws ItemException
     */
    public static function create(array $data): StatInterface
    {
        return new Stat(
            self::stat($data, 'name', StatException::INVALID_NAME),
            self::int($data, 'value', StatException::INVALID_VALUE),
            self::bool($data, 'quality', StatException::INVALID_QUALITY),
            self::string($data, 'prefix', StatException::INVALID_PREFIX),
            self::string($data, 'suffix', StatException::INVALID_SUFFIX),
        );
    }

    /**
     * @param DrawingInterface $drawing
     * @param MaterialInterface $material
     * @return StatInterface
     * @throws ItemException
     */
    public static function baseDamage(DrawingInterface $drawing, MaterialInterface $material): StatInterface
    {
        $damage = self::getBaseDamage(
            $drawing->getMinLevel(),
            self::getWeaponSpeed($drawing),
            self::getCriticalChance($drawing),
            self::getCriticalMultiplier($drawing),
            $drawing->isTwoHand(),
        );

        return new Stat(
            self::getDamageElement($material),
            $damage,
            true,
            '',
            '',
        );
    }

    /**
     * @param DrawingInterface $drawing
     * @param MaterialInterface $material
     * @return StatInterface|null
     * @throws ItemException
     */
    public static function baseResist(DrawingInterface $drawing, MaterialInterface $material): ?StatInterface
    {
        $resist = self::getBaseResist($drawing);

        if ($resist === 0) {
            return null;
        }

        return new Stat(
            self::getResistElement($material),
            $resist,
            true,
            '',
            '%',
        );
    }

    /**
     * @param DrawingInterface $drawing
     * @return StatInterface|null
     * @throws ItemException
     */
    public static function baseDefense(DrawingInterface $drawing): ?StatInterface
    {
        $defense = self::getBaseDefense($drawing);

        if ($defense === 0) {
            return null;
        }

        return new Stat(
            'defense.defense',
            $defense,
            true,
            '',
            '',
        );
    }

    /**
     * @param DrawingInterface $drawing
     * @return StatInterface|null
     * @throws ItemException
     */
    public static function baseMagicDefense(DrawingInterface $drawing): ?StatInterface
    {
        $defense = self::getBaseMagicDefense($drawing);

        if ($defense === 0) {
            return null;
        }

        return new Stat(
            'defense.magicDefense',
            $defense,
            true,
            '',
            '',
        );
    }

    /**
     * @param DrawingInterface $drawing
     * @return StatInterface|null
     * @throws ItemException
     */
    public static function baseMana(DrawingInterface $drawing): ?StatInterface
    {
        $baseMana = self::getBaseMana($drawing);

        if ($baseMana === 0) {
            return null;
        }

        return new Stat(
            'base.mana',
            $baseMana,
            true,
            '+',
            '',
        );
    }

    /**
     * @param MaterialInterface $material
     * @return string
     */
    private static function getDamageElement(MaterialInterface $material): string
    {
        switch ($material->getElement()->getId()) {
            case MaterialElementInterface::FIRE:
                return 'offense.fireDamage';
            case MaterialElementInterface::WATER:
                return 'offense.waterDamage';
            case MaterialElementInterface::AIR:
                return 'offense.airDamage';
            case MaterialElementInterface::EARTH:
                return 'offense.earthDamage';
            case MaterialElementInterface::LIFE:
                return 'offense.lifeDamage';
            case MaterialElementInterface::DEATH:
                return 'offense.deathDamage';
            default:
                return 'offense.physicalDamage';
        }
    }

    /**
     * @param MaterialInterface $material
     * @return string
     */
    private static function getResistElement(MaterialInterface $material): string
    {
        switch ($material->getElement()->getId()) {
            case MaterialElementInterface::FIRE:
                return 'defense.fireResist';
            case MaterialElementInterface::WATER:
                return 'defense.waterResist';
            case MaterialElementInterface::AIR:
                return 'defense.airResist';
            case MaterialElementInterface::EARTH:
                return 'defense.earthResist';
            case MaterialElementInterface::LIFE:
                return 'defense.lifeResist';
            case MaterialElementInterface::DEATH:
                return 'defense.deathResist';
            default:
                return 'defense.physicalResist';
        }
    }

    /**
     * @param int $itemLevel
     * @param int $attackSpeed
     * @param int $criticalChance
     * @param int $criticalMultiplier
     * @param bool $twoHand
     * @return int
     */
    private static function getBaseDamage(
        int $itemLevel,
        int $attackSpeed,
        int $criticalChance,
        int $criticalMultiplier,
        bool $twoHand
    ): int
    {
        if ($twoHand) {
            $base = ItemInterface::BASE_TWO_HAND_DAMAGE;
            $multiplier = ItemInterface::BASE_TWO_HAND_DAMAGE_MULTIPLIER;
        } else {
            $base = ItemInterface::BASE_ONE_HAND_DAMAGE;
            $multiplier = ItemInterface::BASE_ONE_HAND_DAMAGE_MULTIPLIER;
        }

        $dps = floor($base + $itemLevel * $multiplier);
        $baseDPS = $dps / (1 + ($criticalChance / 100) * ($criticalMultiplier / 100 - 1));

        return (int)round($baseDPS / ($attackSpeed / 100));
    }

    /**
     * @param DrawingInterface $drawing
     * @return int
     * @throws ItemException
     */
    private static function getBaseResist(DrawingInterface $drawing): int
    {
        if (!$drawing->getArmorType()) {
            throw new ItemException(StatException::MISS_ARMOR_TYPE);
        }

        if (!$drawing->getSectionType()) {
            throw new ItemException(StatException::MISS_SECTION_TYPE);
        }

        if ($drawing->getArmorType()->getId() === ArmorTypeInterface::ROBE) {
            return 0;
        }

        $base = 0;
        $multiplier = 0;

        switch ([$drawing->getArmorType()->getId(), $drawing->getSectionType()->getId()]) {
            // armor
            case [ArmorTypeInterface::LIGHT, SectionTypeInterface::ARMOR]:
                $base = 5;
                $multiplier = 0.3;
                break;
            case [ArmorTypeInterface::MIDDLE, SectionTypeInterface::ARMOR]:
                $base = 10;
                $multiplier = 0.4;
                break;
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::ARMOR]:
                $base = 20;
                $multiplier = 1.1;
                break;
            // helmet
            case [ArmorTypeInterface::LIGHT, SectionTypeInterface::HELMET]:
                $base = 3;
                $multiplier = 0.4;
                break;
            case [ArmorTypeInterface::MIDDLE, SectionTypeInterface::HELMET]:
                $base = 7;
                $multiplier = 0.4;
                break;
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::HELMET]:
                $base = 10;
                $multiplier = 1.2;
                break;
            // legs
            case [ArmorTypeInterface::LIGHT, SectionTypeInterface::LEGS]:
                $base = 4;
                $multiplier = 0.3;
                break;
            case [ArmorTypeInterface::MIDDLE, SectionTypeInterface::LEGS]:
                $base = 6;
                $multiplier = 0.4;
                break;
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::LEGS]:
                $base = 9;
                $multiplier = 1.1;
                break;
            // boots and gloves
            case [ArmorTypeInterface::LIGHT, SectionTypeInterface::BOOTS]:
            case [ArmorTypeInterface::LIGHT, SectionTypeInterface::GLOVES]:
                $base = 3;
                $multiplier = 0.3;
                break;
            case [ArmorTypeInterface::MIDDLE, SectionTypeInterface::BOOTS]:
            case [ArmorTypeInterface::MIDDLE, SectionTypeInterface::GLOVES]:
                $base = 5;
                $multiplier = 0.4;
                break;
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::BOOTS]:
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::GLOVES]:
                $base = 8;
                $multiplier = 1.1;
                break;
            // shoulders
            case [ArmorTypeInterface::LIGHT, SectionTypeInterface::SHOULDERS]:
                $base = 4;
                $multiplier = 0.25;
                break;
            case [ArmorTypeInterface::MIDDLE, SectionTypeInterface::SHOULDERS]:
                $base = 7;
                $multiplier = 0.35;
                break;
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::SHOULDERS]:
                $base = 10;
                $multiplier = 1.1;
                break;
            // shields
            case [ArmorTypeInterface::MIDDLE, SectionTypeInterface::LEFT_HAND]:
                $base = 19;
                $multiplier = 1.1;
                break;
            // rings
            case [ArmorTypeInterface::LIGHT, SectionTypeInterface::RING]:
                $base = 5;
                $multiplier = 0.36;
                break;
            // amulets
            case [ArmorTypeInterface::LIGHT, SectionTypeInterface::AMULET]:
                $base = 9;
                $multiplier = 0.5;
                break;
        }

        return (int)($base + $drawing->getMinLevel() * $multiplier);
    }

    /**
     * @param DrawingInterface $drawing
     * @return int
     * @throws ItemException
     */
    private static function getBaseMagicDefense(DrawingInterface $drawing): int
    {
        if (!$drawing->getArmorType()) {
            throw new ItemException(StatException::MISS_ARMOR_TYPE);
        }

        if (!$drawing->getSectionType()) {
            throw new ItemException(StatException::MISS_SECTION_TYPE);
        }

        $base = 0;
        $perLevel = 35;
        $typeMultiplier = 0;

        switch ([$drawing->getArmorType()->getId(), $drawing->getSectionType()->getId()]) {
            // ring
            case [ArmorTypeInterface::LIGHT, SectionTypeInterface::RING]:
                $base = 100;
                $typeMultiplier = 0.45;
                break;
            // amulet
            case [ArmorTypeInterface::LIGHT, SectionTypeInterface::AMULET]:
                $base = 70;
                $typeMultiplier = 0.75;
                break;
            // robe
            case [ArmorTypeInterface::ROBE, SectionTypeInterface::ARMOR]:
                $base = 80;
                $typeMultiplier = 0.5;
                break;
            case [ArmorTypeInterface::ROBE, SectionTypeInterface::HELMET]:
                $base = 60;
                $typeMultiplier = 0.4;
                break;
            case [ArmorTypeInterface::ROBE, SectionTypeInterface::LEGS]:
                $base = 50;
                $typeMultiplier = 0.4;
                break;
            case [ArmorTypeInterface::ROBE, SectionTypeInterface::SHOULDERS]:
                $base = 45;
                $typeMultiplier = 0.4;
                break;
            case [ArmorTypeInterface::ROBE, SectionTypeInterface::GLOVES]:
            case [ArmorTypeInterface::ROBE, SectionTypeInterface::BOOTS]:
                $base = 40;
                $typeMultiplier = 0.4;
                break;
            // heavy
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::ARMOR]:
                $perLevel = 43;
                $base = -85;
                $typeMultiplier = 0.5;
                break;
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::HELMET]:
                $perLevel = 43;
                $base = -65;
                $typeMultiplier = 0.4;
                break;
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::LEGS]:
                $perLevel = 43;
                $base = -55;
                $typeMultiplier = 0.4;
                break;
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::SHOULDERS]:
                $perLevel = 43;
                $base = -50;
                $typeMultiplier = 0.4;
                break;
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::GLOVES]:
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::BOOTS]:
                $perLevel = 43;
                $base = -45;
                $typeMultiplier = 0.4;
                break;
            // shield
            case [ArmorTypeInterface::MIDDLE, SectionTypeInterface::LEFT_HAND]:
                return (int)((-150 - ($drawing->getMinLevel() - 1) * 60) * 0.7);
        }

        if ($base > 0) {
            return (int)(($base + ($drawing->getMinLevel() - 1) * $perLevel) * $typeMultiplier);
        }

        return (int)(($base - ($drawing->getMinLevel() - 1) * $perLevel) * $typeMultiplier);
    }

    /**
     * @param DrawingInterface $drawing
     * @return int
     * @throws ItemException
     */
    private static function getBaseDefense(DrawingInterface $drawing): int
    {
        if (!$drawing->getArmorType()) {
            throw new ItemException(StatException::MISS_ARMOR_TYPE);
        }

        if (!$drawing->getSectionType()) {
            throw new ItemException(StatException::MISS_SECTION_TYPE);
        }

        $base = 0;
        $perLevel = 43;
        $typeMultiplier = 0;

        switch ([$drawing->getArmorType()->getId(), $drawing->getSectionType()->getId()]) {
            // light
            case [ArmorTypeInterface::LIGHT, SectionTypeInterface::ARMOR]:
                $base = 85;
                $typeMultiplier = 0.5;
                break;
            case [ArmorTypeInterface::LIGHT, SectionTypeInterface::HELMET]:
                $base = 65;
                $typeMultiplier = 0.4;
                break;
            case [ArmorTypeInterface::LIGHT, SectionTypeInterface::LEGS]:
                $base = 55;
                $typeMultiplier = 0.4;
                break;
            case [ArmorTypeInterface::LIGHT, SectionTypeInterface::SHOULDERS]:
                $base = 50;
                $typeMultiplier = 0.4;
                break;
            case [ArmorTypeInterface::LIGHT, SectionTypeInterface::GLOVES]:
            case [ArmorTypeInterface::LIGHT, SectionTypeInterface::BOOTS]:
                $base = 45;
                $typeMultiplier = 0.4;
                break;
            // middle
            case [ArmorTypeInterface::MIDDLE, SectionTypeInterface::ARMOR]:
                $base = 55;
                $typeMultiplier = 0.3;
                break;
            case [ArmorTypeInterface::MIDDLE, SectionTypeInterface::HELMET]:
                $base = 45;
                $typeMultiplier = 0.2;
                break;
            case [ArmorTypeInterface::MIDDLE, SectionTypeInterface::LEGS]:
                $base = 35;
                $typeMultiplier = 0.2;
                break;
            case [ArmorTypeInterface::MIDDLE, SectionTypeInterface::SHOULDERS]:
                $base = 30;
                $typeMultiplier = 0.2;
                break;
            case [ArmorTypeInterface::MIDDLE, SectionTypeInterface::GLOVES]:
            case [ArmorTypeInterface::MIDDLE, SectionTypeInterface::BOOTS]:
                $base = 25;
                $typeMultiplier = 0.2;
                break;
            // heavy
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::ARMOR]:
                $base = -85;
                $typeMultiplier = 0.5;
                break;
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::HELMET]:
                $base = -65;
                $typeMultiplier = 0.4;
                break;
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::LEGS]:
                $base = -55;
                $typeMultiplier = 0.4;
                break;
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::SHOULDERS]:
                $base = -50;
                $typeMultiplier = 0.4;
                break;
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::GLOVES]:
            case [ArmorTypeInterface::HEAVY, SectionTypeInterface::BOOTS]:
                $base = -45;
                $typeMultiplier = 0.4;
                break;
            // shield
            case [ArmorTypeInterface::MIDDLE, SectionTypeInterface::LEFT_HAND]:
                $base = -150;
                $perLevel = 60;
                $typeMultiplier = 0.7;
                break;
        }

        if ($base > 0) {
            return (int)(($base + ($drawing->getMinLevel() - 1) * $perLevel) * $typeMultiplier);
        }

        return (int)(($base - ($drawing->getMinLevel() - 1) * $perLevel) * $typeMultiplier);
    }

    /**
     * @param DrawingInterface $drawing
     * @return int
     * @throws ItemException
     */
    private static function getBaseMana(DrawingInterface $drawing): int
    {
        if (!$drawing->getArmorType()) {
            throw new ItemException(StatException::MISS_ARMOR_TYPE);
        }

        if (!$drawing->getSectionType()) {
            throw new ItemException(StatException::MISS_SECTION_TYPE);
        }

        if ($drawing->getArmorType()->getId() !== ArmorTypeInterface::ROBE) {
            return 0;
        }

        $typeMultiplier = 0;

        switch ($drawing->getSectionType()->getId()) {
            case SectionTypeInterface::ARMOR:
                $typeMultiplier = 1;
                break;
            case SectionTypeInterface::HELMET:
                $typeMultiplier = 0.7;
                break;
            case SectionTypeInterface::LEGS:
                $typeMultiplier = 0.6;
                break;
            case SectionTypeInterface::SHOULDERS:
                $typeMultiplier = 0.5;
                break;
            case SectionTypeInterface::GLOVES:
            case SectionTypeInterface::BOOTS:
                $typeMultiplier = 0.4;
                break;
        }

        return (int)((16 + ($drawing->getMinLevel() - 1) * 4) * $typeMultiplier);
    }

    /**
     * @param DrawingInterface $drawing
     * @return int
     * @throws ItemException
     */
    private static function getWeaponSpeed(DrawingInterface $drawing): int
    {
        foreach ($drawing->getStats() as $stat) {
            if ($stat->getName() === 'offense.attackSpeed' || $stat->getName() === 'offense.castSpeed') {
                return $stat->getValue();
            }
        }

        throw new ItemException(StatException::MISS_WEAPON_SPEED);
    }

    /**
     * @param DrawingInterface $drawing
     * @return int
     */
    private static function getCriticalChance(DrawingInterface $drawing): int
    {
        foreach ($drawing->getStats() as $stat) {
            if ($stat->getName() === 'offense.criticalChance') {
                return $stat->getValue();
            }
        }

        return 0;
    }

    /**
     * @param DrawingInterface $drawing
     * @return int
     */
    private static function getCriticalMultiplier(DrawingInterface $drawing): int
    {
        foreach ($drawing->getStats() as $stat) {
            if ($stat->getName() === 'offense.criticalMultiplier') {
                return $stat->getValue();
            }
        }

        return 0;
    }
}
