<?php

declare(strict_types=1);

namespace Item\Generator;

use Exception;
use Item\Affix\DataProvider\AffixDataProvider;
use Item\Affix\Type\AffixTypeInterface;
use Item\Base\Base;
use Item\Defense\Defense;
use Item\Drawing\DataProvider\AbstractDrawingDataProvider;
use Item\Drawing\DrawingInterface;
use Item\Drawing\Stat\StatFactory;
use Item\Item;
use Item\ItemException;
use Item\ItemInterface;
use Item\Material\DataProvider\Fabric;
use Item\Material\DataProvider\Leather;
use Item\Material\DataProvider\Metal;
use Item\Material\DataProvider\Wood;
use Item\Material\Element\MaterialElementInterface;
use Item\Material\MaterialException;
use Item\Material\MaterialInterface;
use Item\Offense\Offense;
use Item\Type\ItemTypeInterface;
use Item\Type\MagicQuality\MagicQuality;
use Item\Type\MagicQuality\MagicQualityInterface;
use Item\Type\Material\MaterialTypeInterface;
use Item\Type\Quality\Quality;
use Item\Type\Quality\QualityInterface;
use Ramsey\Uuid\Uuid;

class Generator
{
    /**
     * @param int $itemLevel
     * @param int $intMagicQuality
     * @param int $maxMagicQuality
     * @param string $inventoryId
     * @return ItemInterface
     * @throws Exception
     */
    public static function random(int $itemLevel, int $intMagicQuality, int $maxMagicQuality, string $inventoryId): ItemInterface
    {
        $drawing = self::getRandomDrawing($itemLevel);
        $material = self::getMaterial($drawing, $itemLevel);
        $magicQuality = new MagicQuality(random_int($intMagicQuality, $maxMagicQuality));
        $quality = new Quality(random_int($magicQuality->getMinQuality(), $magicQuality->getMaxQuality()), $drawing->getGenderType());

        return self::equip(
            $drawing,
            $material,
            $quality,
            $magicQuality,
            $itemLevel,
            $inventoryId
        );
    }

    /**
     * @param DrawingInterface $drawing
     * @param MaterialInterface $material
     * @param QualityInterface $quality
     * @param MagicQualityInterface $magicQuality
     * @param int $itemLevel
     * @param string $inventoryId
     * @return ItemInterface
     * @throws Exception
     */
    public static function equip(
        DrawingInterface $drawing,
        MaterialInterface $material,
        QualityInterface $quality,
        MagicQualityInterface $magicQuality,
        int $itemLevel,
        string $inventoryId
    ): ItemInterface
    {
        if ($drawing->getType()->getId() !== ItemTypeInterface::EQUIP) {
            throw new ItemException(ItemException::EQUIP_TYPE_ONLY);
        }

        if ($drawing->getGenderType() === null) {
            throw new ItemException(ItemException::EQUIP_MISS_GENDER);
        }

        $minLevel = $drawing->getMinLevel();

        if ($drawing->getWeaponType()) {
            $drawing->getStats()->addFirst(StatFactory::baseDamage($drawing, $material));
        }

        if ($drawing->getArmorType() && $mana = StatFactory::baseMana($drawing)) {
            $drawing->getStats()->addFirst($mana);
        }

        if ($drawing->getArmorType() && $resist = StatFactory::baseResist($drawing, $material)) {
            $drawing->getStats()->addFirst($resist);
        }

        if ($drawing->getArmorType() && $magicDefense = StatFactory::baseMagicDefense($drawing)) {
            $drawing->getStats()->addFirst($magicDefense);
        }

        if ($drawing->getArmorType() && $defense = StatFactory::baseDefense($drawing)) {
            $drawing->getStats()->addFirst($defense);
        }

        $materialPrefix = $material->getPrefix() ? $material->getPrefix() . $drawing->getGenderType()->getSuffix() : '';
        $materialSuffix = $material->getSuffix() ? $material->getSuffix() . $drawing->getGenderType()->getSuffix() : '';

        $name = "{$quality->getPrefix()}|$materialPrefix|{$drawing->getName()}|$materialSuffix";
        $minStrength = (int)((ItemInterface::BASE_STAT_REQUIREMENT + $minLevel * ItemInterface::STAT_REQUIREMENT_PER_LEVEL) * $drawing->getStrength() * $material->getQuality());
        $minDexterity = (int)((ItemInterface::BASE_STAT_REQUIREMENT + $minLevel * ItemInterface::STAT_REQUIREMENT_PER_LEVEL) * $drawing->getDexterity() * $material->getQuality());
        $minIntelligence = (int)((ItemInterface::BASE_STAT_REQUIREMENT + $minLevel * ItemInterface::STAT_REQUIREMENT_PER_LEVEL) * $drawing->getIntelligence() * $material->getQuality());

        $price = (int)($drawing->getPrice() * $quality->getValue() * $material->getQuality());
        $weight = (int)($drawing->getWeight() * $quality->getValue() * $material->getQuality());

        if ($drawing->getWeaponType()) {
            self::addAffixExceptions($drawing, $material);
        }

        $item = new Item(
            Uuid::uuid4()->toString(),
            $drawing->getId(),
            $itemLevel,
            $inventoryId,
            $name,
            $drawing->getIcon(),
            $price,
            $minLevel,
            $minStrength,
            $minDexterity,
            $minIntelligence,
            '',
            '',
            $drawing->getType(),
            $magicQuality,
            new Base($weight),
            new Offense($drawing->getWeaponType(), $drawing->getDamageType()),
            new Defense(),
            $drawing->getEquipType(),
            $drawing->getSectionType(),
            $drawing->getArmorType(),
            $drawing->getPotionType(),
            $drawing->getMagicType(),
        );

        $item->applyStats($drawing->getStats(), $quality->getValue(), $material->getQuality());

        if ($item->getMagicType() !== null && $item->getMagicQuality()->getId() !== MagicQualityInterface::COMMON) {
            $affixes = AffixDataProvider::get($drawing, $item->getMagicType(), $item->getMagicQuality(), $item->getItemLevel());
            $item->applyAffixes($affixes, $quality->getValue(), $material->getQuality());
        }

        return $item;
    }

    /**
     * @param DrawingInterface $drawing
     * @param MaterialInterface $material
     */
    public static function addAffixExceptions(DrawingInterface $drawing, MaterialInterface $material): void
    {
        $exceptions = [
            AffixTypeInterface::INCREASE_PHYSICAL_DAMAGE,
            AffixTypeInterface::INCREASE_FIRE_DAMAGE,
            AffixTypeInterface::INCREASE_WATER_DAMAGE,
            AffixTypeInterface::INCREASE_AIR_DAMAGE,
            AffixTypeInterface::INCREASE_EARTH_DAMAGE,
            AffixTypeInterface::INCREASE_LIFE_DAMAGE,
            AffixTypeInterface::INCREASE_DEATH_DAMAGE,

            AffixTypeInterface::DOUBLE_PHYSICAL_DAMAGE,
            AffixTypeInterface::DOUBLE_FIRE_DAMAGE,
            AffixTypeInterface::DOUBLE_WATER_DAMAGE,
            AffixTypeInterface::DOUBLE_AIR_DAMAGE,
            AffixTypeInterface::DOUBLE_EARTH_DAMAGE,
            AffixTypeInterface::DOUBLE_LIFE_DAMAGE,
            AffixTypeInterface::DOUBLE_DEATH_DAMAGE,
        ];

        switch ($material->getElement()->getId()) {
            case MaterialElementInterface::PHYSICAL:
                unset($exceptions[0], $exceptions[7]);
                break;
            case MaterialElementInterface::FIRE:
                unset($exceptions[1], $exceptions[8]);
                break;
            case MaterialElementInterface::WATER:
                unset($exceptions[2], $exceptions[9]);
                break;
            case MaterialElementInterface::AIR:
                unset($exceptions[3], $exceptions[10]);
                break;
            case MaterialElementInterface::EARTH:
                unset($exceptions[4], $exceptions[11]);
                break;
            case MaterialElementInterface::LIFE:
                unset($exceptions[5], $exceptions[12]);
                break;
            case MaterialElementInterface::DEATH:
                unset($exceptions[6], $exceptions[13]);
                break;
        }

        $drawing->addAffixException($exceptions);
    }

    /**
     * @param DrawingInterface $drawing
     * @param int $itemLevel
     * @return MaterialInterface
     * @throws ItemException
     */
    public static function getMaterial(DrawingInterface $drawing, int $itemLevel): MaterialInterface
    {
        if (!$drawing->getMaterialType()) {
            throw new ItemException(MaterialException::EXPECTED_EQUIP);
        }

        if ($drawing->getMaterialType()->getId() === MaterialTypeInterface::METAL) {
            return Metal::getRandom($itemLevel);
        }

        if ($drawing->getMaterialType()->getId() === MaterialTypeInterface::WOOD) {
            return Wood::getRandom($itemLevel);
        }

        if ($drawing->getMaterialType()->getId() === MaterialTypeInterface::LEATHER) {
            return Leather::getRandom($itemLevel);
        }

        return Fabric::getRandom($itemLevel);
    }

    /**
     * @param int $itemLevel
     * @return DrawingInterface
     * @throws Exception
     */
    private static function getRandomDrawing(int $itemLevel): DrawingInterface
    {
        $groups = AbstractDrawingDataProvider::getGroups();
        $group = $groups[random_int(0, count($groups) - 1)];

        return $group::getRandom($itemLevel);
    }
}
