<?php

declare(strict_types=1);

namespace Item\Drawing;

use Item\Drawing\Stat\StatCollection;
use Item\Type\Armor\ArmorTypeInterface;
use Item\Type\Damage\DamageTypeInterface;
use Item\Type\Equip\EquipTypeInterface;
use Item\Type\Gender\GenderTypeInterface;
use Item\Type\ItemTypeInterface;
use Item\Type\Magic\MagicTypeInterface;
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
    private int $weight;
    private int $minLevel;
    private float $strength;
    private float $dexterity;
    private float $intelligence;
    private array $affixException;
    private bool $twoHand = false;
    private StatCollection $stats;
    private ItemTypeInterface $type;
    private ?EquipTypeInterface $equipType;
    private ?SectionTypeInterface $sectionType;
    private ?WeaponTypeInterface $weaponType;
    private ?DamageTypeInterface $damageType;
    private ?ArmorTypeInterface $armorType;
    private ?PotionTypeInterface $potionType;
    private ?MaterialTypeInterface $materialType;
    private ?GenderTypeInterface $genderType;
    private ?MagicTypeInterface $magicType;

    public function __construct(
        int $id,
        string $name,
        string $icon,
        int $price,
        int $weight,
        int $minLevel,
        float $strength,
        float $dexterity,
        float $intelligence,
        array $affixException,
        StatCollection $stats,
        ItemTypeInterface $type,
        ?EquipTypeInterface $equipType,
        ?SectionTypeInterface $sectionType,
        ?WeaponTypeInterface $weaponType,
        ?DamageTypeInterface $damageType,
        ?ArmorTypeInterface $armorType,
        ?PotionTypeInterface $potionType,
        ?MaterialTypeInterface $materialType,
        ?GenderTypeInterface $genderType,
        ?MagicTypeInterface $magicType
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->icon = $icon;
        $this->price = $price;
        $this->weight = $weight;
        $this->minLevel = $minLevel;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
        $this->intelligence = $intelligence;
        $this->affixException = $affixException;
        $this->stats = $stats;
        $this->type = $type;
        $this->equipType = $equipType;
        $this->sectionType = $sectionType;
        $this->weaponType = $weaponType;
        $this->damageType = $damageType;
        $this->armorType = $armorType;
        $this->potionType = $potionType;
        $this->materialType = $materialType;
        $this->genderType = $genderType;
        $this->magicType = $magicType;

        if ($this->equipType && $this->equipType->getId() === EquipTypeInterface::TWO_HAND) {
            $this->twoHand = true;
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
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * @return int
     */
    public function getMinLevel(): int
    {
        return $this->minLevel;
    }

    /**
     * @return float
     */
    public function getStrength(): float
    {
        return $this->strength;
    }

    /**
     * @return float
     */
    public function getDexterity(): float
    {
        return $this->dexterity;
    }

    /**
     * @return float
     */
    public function getIntelligence(): float
    {
        return $this->intelligence;
    }

    /**
     * @return array
     */
    public function getAffixException(): array
    {
        return $this->affixException;
    }

    /**
     * @param array $affixExceptions
     */
    public function addAffixException(array $affixExceptions): void
    {
        $this->affixException = array_merge($this->affixException, $affixExceptions);
    }

    /**
     * @return bool
     */
    public function isTwoHand(): bool
    {
        return $this->twoHand;
    }

    /**
     * @return StatCollection
     */
    public function getStats(): StatCollection
    {
        return $this->stats;
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
     * @return DamageTypeInterface|null
     */
    public function getDamageType(): ?DamageTypeInterface
    {
        return $this->damageType;
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

    /**
     * @return MagicTypeInterface|null
     */
    public function getMagicType(): ?MagicTypeInterface
    {
        return $this->magicType;
    }
}
