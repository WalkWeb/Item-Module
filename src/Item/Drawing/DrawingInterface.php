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

interface DrawingInterface
{
    public function getId(): int;
    public function getName(): string;
    public function getIcon(): string;
    public function getPrice(): int;
    public function getWeight(): int;
    public function getMinLevel(): int;
    public function getStrength(): float;
    public function getDexterity(): float;
    public function getIntelligence(): float;
    public function getAffixException(): array;
    public function addAffixException(array $affixExceptions): void;
    public function isTwoHand(): bool;
    public function getStats(): StatCollection;
    public function getType(): ItemTypeInterface;
    public function getEquipType(): ?EquipTypeInterface;
    public function getSectionType(): ?SectionTypeInterface;
    public function getWeaponType(): ?WeaponTypeInterface;
    public function getDamageType(): ?DamageTypeInterface;
    public function getArmorType(): ?ArmorTypeInterface;
    public function getPotionType(): ?PotionTypeInterface;
    public function getMaterialType(): ?MaterialTypeInterface;
    public function getGenderType(): ?GenderTypeInterface;
    public function getMagicType(): ?MagicTypeInterface;
}
