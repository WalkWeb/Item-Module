<?php

declare(strict_types=1);

namespace Item\Drawing;

use Item\Type\Armor\ArmorTypeInterface;
use Item\Type\Equip\EquipTypeInterface;
use Item\Type\ItemTypeInterface;
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
    public function getMinLevel(): int;
    public function getMinStrength(): int;
    public function getMinDexterity(): int;
    public function getMinIntelligence(): int;
    public function getType(): ItemTypeInterface;
    public function getEquipType(): ?EquipTypeInterface;
    public function getSectionType(): ?SectionTypeInterface;
    public function getWeaponType(): ?WeaponTypeInterface;
    public function getArmorType(): ?ArmorTypeInterface;
    public function getPotionType(): ?PotionTypeInterface;
    public function getMaterialType(): ?MaterialTypeInterface;
}
