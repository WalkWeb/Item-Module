<?php

declare(strict_types=1);

namespace Item\Drawing;

use Item\ItemException;
use Item\Traits\ValidationTrait;
use Item\Type\Armor\ArmorType;
use Item\Type\Equip\EquipType;
use Item\Type\Gender\GenderType;
use Item\Type\ItemType;
use Item\Type\ItemTypeInterface;
use Item\Type\Material\MaterialType;
use Item\Type\Potion\PotionType;
use Item\Type\Section\SectionType;
use Item\Type\Weapon\WeaponType;

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

        $equipTypeId = self::intOrNull($data, 'equip_type_id', DrawingException::INVALID_EQUIP_TYPE_ID);
        $equipType = $equipTypeId ? new EquipType($equipTypeId) : null;

        $sectionTypeId = self::intOrNull($data, 'section_type_id', DrawingException::INVALID_SECTION_TYPE_ID);
        $sectionType = $sectionTypeId ? new SectionType($sectionTypeId) : null;

        $weaponTypeId = self::intOrNull($data, 'weapon_type_id', DrawingException::INVALID_WEAPON_TYPE_ID);
        $weaponType = $weaponTypeId ? new WeaponType($weaponTypeId) : null;

        $armorTypeId = self::intOrNull($data, 'armor_type_id', DrawingException::INVALID_ARMOR_TYPE_ID);
        $armorType = $armorTypeId ? new ArmorType($armorTypeId) : null;

        $potionTypeId = self::intOrNull($data, 'potion_type_id', DrawingException::INVALID_POTION_TYPE_ID);
        $potionType = $potionTypeId ? new PotionType($potionTypeId) : null;

        $materialTypeId = self::intOrNull($data, 'material_type_id', DrawingException::INVALID_MATERIAL_TYPE_ID);
        $materialType = $materialTypeId ? new MaterialType($materialTypeId) : null;

        $genderId = self::intOrNull($data, 'gender_type_id', DrawingException::INVALID_GENDER_TYPE_ID);
        $gender = $genderId ? new GenderType($genderId) : null;

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

        return new Drawing(
            self::int($data, 'id', DrawingException::INVALID_ID),
            self::string($data, 'name', DrawingException::INVALID_NAME),
            self::string($data, 'icon', DrawingException::INVALID_ICON),
            self::int($data, 'price', DrawingException::INVALID_PRICE),
            self::int($data, 'min_level', DrawingException::INVALID_MIN_LEVEL),
            self::int($data, 'min_strength', DrawingException::INVALID_MIN_STRENGTH),
            self::int($data, 'min_dexterity', DrawingException::INVALID_MIN_DEXTERITY),
            self::int($data, 'min_intelligence', DrawingException::INVALID_MIN_INTELLIGENCE),
            $type,
            $equipType,
            $sectionType,
            $weaponType,
            $armorType,
            $potionType,
            $materialType,
            $gender
        );
    }
}
