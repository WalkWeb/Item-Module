<?php

declare(strict_types=1);

namespace Item\Drawing;

use Item\Type\Armor\ArmorTypeInterface;
use Item\Type\Equip\EquipTypeInterface;
use Item\Type\Gender\GenderTypeInterface;
use Item\Type\ItemTypeInterface;
use Item\Type\Material\MaterialTypeInterface;
use Item\Type\Potion\PotionTypeInterface;
use Item\Type\Section\SectionTypeInterface;
use Item\Type\Weapon\WeaponTypeInterface;

class Drawing implements DrawingInterface
{
    private int $id;
    private string $name;
    private string $icon;
    private int $price;
    private int $minLevel;
    private int $minStrength;
    private int $minDexterity;
    private int $minIntelligence;
    private ItemTypeInterface $type;
    private ?EquipTypeInterface $equipType;
    private ?SectionTypeInterface $sectionType;
    private ?WeaponTypeInterface $weaponType;
    private ?ArmorTypeInterface $armorType;
    private ?PotionTypeInterface $potionType;
    private ?MaterialTypeInterface $materialType;
    private ?GenderTypeInterface $genderType;

    public function __construct(
        int $id,
        string $name,
        string $icon,
        int $price,
        int $minLevel,
        int $minStrength,
        int $minDexterity,
        int $minIntelligence,
        ItemTypeInterface $type,
        ?EquipTypeInterface $equipType,
        ?SectionTypeInterface $sectionType,
        ?WeaponTypeInterface $weaponType,
        ?ArmorTypeInterface $armorType,
        ?PotionTypeInterface $potionType,
        ?MaterialTypeInterface $materialType,
        ?GenderTypeInterface $genderType
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->icon = $icon;
        $this->price = $price;
        $this->minLevel = $minLevel;
        $this->minStrength = $minStrength;
        $this->minDexterity = $minDexterity;
        $this->minIntelligence = $minIntelligence;
        $this->type = $type;
        $this->equipType = $equipType;
        $this->sectionType = $sectionType;
        $this->weaponType = $weaponType;
        $this->armorType = $armorType;
        $this->potionType = $potionType;
        $this->materialType = $materialType;
        $this->genderType = $genderType;
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

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getMinLevel(): int
    {
        return $this->minLevel;
    }

    /**
     * @return int
     */
    public function getMinStrength(): int
    {
        return $this->minStrength;
    }

    /**
     * @return int
     */
    public function getMinDexterity(): int
    {
        return $this->minDexterity;
    }

    /**
     * @return int
     */
    public function getMinIntelligence(): int
    {
        return $this->minIntelligence;
    }

    /**
     * @return ItemTypeInterface
     */
    public function getType(): ItemTypeInterface
    {
        return $this->type;
    }

    /**
     * @return EquipTypeInterface|null
     */
    public function getEquipType(): ?EquipTypeInterface
    {
        return $this->equipType;
    }

    /**
     * @return SectionTypeInterface|null
     */
    public function getSectionType(): ?SectionTypeInterface
    {
        return $this->sectionType;
    }

    /**
     * @return WeaponTypeInterface|null
     */
    public function getWeaponType(): ?WeaponTypeInterface
    {
        return $this->weaponType;
    }

    /**
     * @return ArmorTypeInterface|null
     */
    public function getArmorType(): ?ArmorTypeInterface
    {
        return $this->armorType;
    }

    /**
     * @return PotionTypeInterface|null
     */
    public function getPotionType(): ?PotionTypeInterface
    {
        return $this->potionType;
    }

    /**
     * @return MaterialTypeInterface|null
     */
    public function getMaterialType(): ?MaterialTypeInterface
    {
        return $this->materialType;
    }

    /**
     * @return GenderTypeInterface|null
     */
    public function getGenderType(): ?GenderTypeInterface
    {
        return $this->genderType;
    }
}
