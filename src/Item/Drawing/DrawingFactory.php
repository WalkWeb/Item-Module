<?php

declare(strict_types=1);

namespace Item\Drawing;

use Item\Drawing\Stat\StatCollectionFactory;
use Item\ItemException;
use Item\ItemInterface;
use Item\Traits\ValidationTrait;
use Item\Type\Armor\ArmorType;
use Item\Type\Armor\ArmorTypeInterface;
use Item\Type\Damage\DamageType;
use Item\Type\Damage\DamageTypeInterface;
use Item\Type\Equip\EquipType;
use Item\Type\Equip\EquipTypeInterface;
use Item\Type\Gender\GenderType;
use Item\Type\ItemType;
use Item\Type\ItemTypeInterface;
use Item\Type\Magic\MagicType;
use Item\Type\Material\MaterialType;
use Item\Type\Potion\PotionType;
use Item\Type\Section\SectionType;
use Item\Type\Weapon\WeaponType;
use Item\Type\Weapon\WeaponTypeInterface;

class DrawingFactory
{
    use ValidationTrait;

    /**
     * @param array $data
     * @return DrawingInterface
     * @throws ItemException
     */
    public static function create(array $data): DrawingInterface
    {
        $type = new ItemType(self::int($data, 'type_id', DrawingException::INVALID_TYPE_ID));

        $minLevel = self::int($data, 'min_level', DrawingException::INVALID_MIN_LEVEL);

        $equipTypeId = self::intOrNull($data, 'equip_type_id', DrawingException::INVALID_EQUIP_TYPE_ID);
        $equipType = $equipTypeId ? new EquipType($equipTypeId) : null;

        $sectionTypeId = self::intOrNull($data, 'section_type_id', DrawingException::INVALID_SECTION_TYPE_ID);
        $sectionType = $sectionTypeId ? new SectionType($sectionTypeId) : null;

        $weaponTypeId = self::intOrNullOrMiss($data, 'weapon_type_id', DrawingException::INVALID_WEAPON_TYPE_ID);
        $weaponType = $weaponTypeId ? new WeaponType($weaponTypeId) : null;

        $armorTypeId = self::intOrNullOrMiss($data, 'armor_type_id', DrawingException::INVALID_ARMOR_TYPE_ID);
        $armorType = $armorTypeId ? new ArmorType($armorTypeId) : null;

        $potionTypeId = self::intOrNullOrMiss($data, 'potion_type_id', DrawingException::INVALID_POTION_TYPE_ID);
        $potionType = $potionTypeId ? new PotionType($potionTypeId) : null;

        $materialTypeId = self::intOrNull($data, 'material_type_id', DrawingException::INVALID_MATERIAL_TYPE_ID);
        $materialType = $materialTypeId ? new MaterialType($materialTypeId) : null;

        $genderId = self::intOrNull($data, 'gender_type_id', DrawingException::INVALID_GENDER_TYPE_ID);
        $gender = $genderId ? new GenderType($genderId) : null;

        $magicTypeId = self::intOrNull($data, 'magic_type_id', DrawingException::INVALID_MAGIC_TYPE_ID);
        $magicType = $magicTypeId ? new MagicType($magicTypeId) : null;

        switch ($type->getId()) {
            case ItemTypeInterface::EQUIP:
                if ($equipType === null) {
                    throw new ItemException(DrawingException::MISS_EQUIP_TYPE);
                }
                if ($sectionType === null) {
                    throw new ItemException(DrawingException::MISS_SECTION_TYPE);
                }
                if ($gender === null) {
                    throw new ItemException(DrawingException::MISS_GENDER_TYPE);
                }
                if ($magicType === null) {
                    throw new ItemException(DrawingException::MISS_MAGIC_TYPE);
                }
                break;
            case ItemTypeInterface::POTION:
                if ($potionType === null) {
                    throw new ItemException(DrawingException::MISS_POTION_TYPE);
                }
                break;
            case ItemTypeInterface::MATERIAL:
                if ($materialType === null) {
                    throw new ItemException(DrawingException::MISS_MATERIAL_TYPE);
                }
                break;
        }

        $affixExceptions = self::array($data, 'affix_exception', DrawingException::INVALID_AFFIX_EXCEPTION);

        foreach ($affixExceptions as $affixException) {
            if (!is_int($affixException)) {
                throw new ItemException(DrawingException::INVALID_AFFIX_DATA);
            }
        }

        $price = self::intOrNullOrMiss($data, 'price', DrawingException::INVALID_PRICE) ??
            self::getBasePrice($minLevel, $equipType, $weaponType, $armorType);

        return new Drawing(
            self::int($data, 'id', DrawingException::INVALID_ID),
            self::string($data, 'name', DrawingException::INVALID_NAME),
            self::string($data, 'icon', DrawingException::INVALID_ICON),
            $price,
            self::int($data, 'weight', DrawingException::INVALID_WEIGHT),
            $minLevel,
            self::float($data, 'strength', DrawingException::INVALID_STRENGTH),
            self::float($data, 'dexterity', DrawingException::INVALID_DEXTERITY),
            self::float($data, 'intelligence', DrawingException::INVALID_INTELLIGENCE),
            $affixExceptions,
            StatCollectionFactory::create(self::array($data, 'stats', DrawingException::INVALID_STATS)),
            $type,
            $equipType,
            $sectionType,
            $weaponType,
            self::getDamageType($weaponType),
            $armorType,
            $potionType,
            $materialType,
            $gender,
            $magicType,
        );
    }

    /**
     * @param WeaponTypeInterface|null $weaponType
     * @return DamageTypeInterface|null
     */
    private static function getDamageType(?WeaponTypeInterface $weaponType): ?DamageTypeInterface
    {
        if ($weaponType === null) {
            return null;
        }

        if ($weaponType->getId() === WeaponTypeInterface::STAFF || $weaponType->getId() === WeaponTypeInterface::WAND) {
            return new DamageType(DamageTypeInterface::SPELL);
        }

        return new DamageType(DamageTypeInterface::ATTACK);
    }

    /**
     * @param int $level
     * @param EquipTypeInterface|null $equipType
     * @param WeaponTypeInterface|null $weaponType
     * @param ArmorTypeInterface|null $armorType
     * @return int
     */
    private static function getBasePrice(
        int $level,
        ?EquipTypeInterface $equipType,
        ?WeaponTypeInterface $weaponType,
        ?ArmorTypeInterface $armorType
    ): int
    {
        $basePrice = (int)(ItemInterface::BASE_PRICE + (($level - 1) * (30 * (1 + ($level / 5)))));
        $weaponMultiplier = 1;
        $handMultiplier = 1;
        $armorTypeMultiplier = 1;
        $typeEquipMultiplier = 1;

        // weapon
        if ($equipType && $weaponType && $weaponType->getId() === WeaponTypeInterface::SWORD) {
            $weaponMultiplier = 1.05;
        }
        if ($equipType && $weaponType && $weaponType->getId() === WeaponTypeInterface::AXE) {
            $weaponMultiplier = 1.2;
        }
        if ($equipType && $weaponType && $weaponType->getId() === WeaponTypeInterface::MACE) {
            $weaponMultiplier = 1.1;
        }
        if ($equipType && $weaponType && $weaponType->getId() === WeaponTypeInterface::DAGGER) {
            $weaponMultiplier = 0.8;
        }
        if ($equipType && $weaponType && $weaponType->getId() === WeaponTypeInterface::SPEAR) {
            $weaponMultiplier = 1;
        }
        if ($equipType && $weaponType && $weaponType->getId() === WeaponTypeInterface::WAND) {
            $weaponMultiplier = 1.2;
        }
        if ($equipType && $weaponType && $weaponType->getId() === WeaponTypeInterface::BOW) {
            $weaponMultiplier = 1.15;
        }
        // heavy
        if ($equipType && $weaponType && $weaponType->getId() === WeaponTypeInterface::CROSSBOW) {
            $weaponMultiplier = 1.35;
        }
        if ($equipType && $weaponType && $weaponType->getId() === WeaponTypeInterface::HEAVY_SWORD) {
            $weaponMultiplier = 1.32;
        }
        if ($equipType && $weaponType && $weaponType->getId() === WeaponTypeInterface::HEAVY_AXE) {
            $weaponMultiplier = 1.3;
        }
        if ($equipType && $weaponType && $weaponType->getId() === WeaponTypeInterface::HEAVY_MACE) {
            $weaponMultiplier = 1.28;
        }
        if ($equipType && $weaponType && $weaponType->getId() === WeaponTypeInterface::TWO_HAND_HEAVY_SWORD) {
            $weaponMultiplier = 1.26;
        }
        if ($equipType && $weaponType && $weaponType->getId() === WeaponTypeInterface::TWO_HAND_HEAVY_AXE) {
            $weaponMultiplier = 1.24;
        }
        if ($equipType && $weaponType && $weaponType->getId() === WeaponTypeInterface::TWO_HAND_HEAVY_MACE) {
            $weaponMultiplier = 1.22;
        }
        if ($equipType && $weaponType && $weaponType->getId() === WeaponTypeInterface::LANCE) {
            $weaponMultiplier = 1.2;
        }

        // one/two hand
        if ($equipType && $weaponType && $equipType->getId() === EquipTypeInterface::TWO_HAND) {
            $handMultiplier = 1.2;
        }

        // type armor
        if ($equipType && $armorType && $armorType->getId() === ArmorTypeInterface::ROBE) {
            $armorTypeMultiplier = 0.8;
        }
        if ($equipType && $armorType && $armorType->getId() === ArmorTypeInterface::LIGHT) {
            $armorTypeMultiplier = 0.9;
        }
        if ($equipType && $armorType && $armorType->getId() === ArmorTypeInterface::MIDDLE) {
            $armorTypeMultiplier = 1.0;
        }
        if ($equipType && $armorType && $armorType->getId() === ArmorTypeInterface::HEAVY) {
            $armorTypeMultiplier = 1.1;
        }

        if ($equipType && $equipType->getId() === EquipTypeInterface::RING) {
            $typeEquipMultiplier = 0.7;
        }
        if ($equipType && $equipType->getId() === EquipTypeInterface::AMULET) {
            $typeEquipMultiplier = 0.9;
        }
        if ($equipType && $equipType->getId() === EquipTypeInterface::HELMET) {
            $typeEquipMultiplier = 0.5;
        }
        if ($equipType && $equipType->getId() === EquipTypeInterface::ARMOR) {
            $typeEquipMultiplier = 0.8;
        }
        if ($equipType && $equipType->getId() === EquipTypeInterface::GLOVES) {
            $typeEquipMultiplier = 0.45;
        }
        if ($equipType && $equipType->getId() === EquipTypeInterface::BOOTS) {
            $typeEquipMultiplier = 0.45;
        }
        if ($equipType && $equipType->getId() === EquipTypeInterface::LEGS) {
            $typeEquipMultiplier = 0.5;
        }
        if ($equipType && $equipType->getId() === EquipTypeInterface::SHOULDERS) {
            $typeEquipMultiplier = 0.4;
        }
        if ($equipType && $equipType->getId() === EquipTypeInterface::SHIELD) {
            $typeEquipMultiplier = 0.4;
        }

        return (int)($basePrice * $weaponMultiplier * $handMultiplier * $armorTypeMultiplier * $typeEquipMultiplier);
    }
}
