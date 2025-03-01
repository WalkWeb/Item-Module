<?php

declare(strict_types=1);

namespace Item;

use Exception;
use Item\Affix\Collection\AffixCollection;
use Item\Base\BaseInterface;
use Item\Defense\DefenseInterface;
use Item\Drawing\Stat\StatCollection;
use Item\Offense\OffenseInterface;
use Item\Translator\TranslatorInterface;
use Item\Type\Armor\ArmorTypeInterface;
use Item\Type\Equip\EquipTypeInterface;
use Item\Type\ItemTypeInterface;
use Item\Type\Magic\MagicTypeInterface;
use Item\Type\MagicQuality\MagicQualityInterface;
use Item\Type\Potion\PotionTypeInterface;
use Item\Type\Section\SectionTypeInterface;

interface ItemInterface
{
    public const BASE_STAT_REQUIREMENT           = 25;
    public const STAT_REQUIREMENT_PER_LEVEL      = 5;

    public const BASE_ONE_HAND_DAMAGE            = 9;
    public const BASE_TWO_HAND_DAMAGE            = 12;
    public const BASE_ONE_HAND_DAMAGE_MULTIPLIER = 3.4;
    public const BASE_TWO_HAND_DAMAGE_MULTIPLIER = 5.3;

    public const BASE_PRICE                      = 300;

    public function getId(): string;
    public function getItemId(): int;
    public function getItemLevel(): int;
    public function getInventoryId(): string;
    public function getName(TranslatorInterface $translator): string;
    public function getIcon(): string;
    public function getPrice(): int;
    public function getMinLevel(): int;
    public function getMinStrength(): int;
    public function getMinDexterity(): int;
    public function getMinIntelligence(): int;
    public function getPropertyInfo(): string;
    public function getMagicPropertyInfo(): string;
    public function getDescription(TranslatorInterface $translator): string;
    public function getMagicDescription(TranslatorInterface $translator): string;
    public function getType(): ItemTypeInterface;
    public function getMagicQuality(): MagicQualityInterface;
    public function getBase(): BaseInterface;
    public function getOffense(): OffenseInterface;
    public function getDefense(): DefenseInterface;
    public function getEquipType(): ?EquipTypeInterface;
    public function getSectionType(): ?SectionTypeInterface;
    public function getArmorType(): ?ArmorTypeInterface;
    public function getPotionType(): ?PotionTypeInterface;
    public function getMagicType(): ?MagicTypeInterface;
    public function getTypeDescription(TranslatorInterface $translator): string;

    /**
     * @param StatCollection $stats
     * @param float $itemQuality
     * @param float $materialQuality
     * @throws ItemException
     */
    public function applyStats(StatCollection $stats, float $itemQuality, float $materialQuality): void;

    /**
     * @param AffixCollection $affixes
     * @param float $itemQuality
     * @param float $materialQuality
     * @throws Exception
     */
    public function applyAffixes(AffixCollection $affixes, float $itemQuality, float $materialQuality): void;
}
