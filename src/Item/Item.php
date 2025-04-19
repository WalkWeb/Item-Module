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
use Item\Type\Weapon\WeaponTypeInterface;

class Item implements ItemInterface
{
    private string $id;
    private int $dbId;
    private int $itemLevel;
    private string $inventoryId;
    private string $name;
    private string $icon;
    private int $price;
    private int $minLevel;
    private int $minStrength;
    private int $minDexterity;
    private int $minIntelligence;
    private string $propertyInfo;
    private string $magicPropertyInfo;
    private ItemTypeInterface $type;
    private MagicQualityInterface $magicQuality;
    private BaseInterface $base;
    private OffenseInterface $offense;
    private DefenseInterface $defense;
    private ?EquipTypeInterface $equipType;
    private ?SectionTypeInterface $sectionType;
    private ?ArmorTypeInterface $armorType;
    private ?PotionTypeInterface $potionType;
    private ?MagicTypeInterface $magicType;
    private bool $shadow = false;

    public function __construct(
        string $id,
        int $dbId,
        int $itemLevel,
        string $inventoryId,
        string $name,
        string $icon,
        int $price,
        int $minLevel,
        int $minStrength,
        int $minDexterity,
        int $minIntelligence,
        string $propertyInfo,
        string $magicPropertyInfo,
        ItemTypeInterface $type,
        MagicQualityInterface $magicQuality,
        BaseInterface $base,
        OffenseInterface $offense,
        DefenseInterface $defense,
        ?EquipTypeInterface $equipType,
        ?SectionTypeInterface $sectionType,
        ?ArmorTypeInterface $armorType,
        ?PotionTypeInterface $potionType,
        ?MagicTypeInterface $magicType
    )
    {
        $this->id = $id;
        $this->dbId = $dbId;
        $this->itemLevel = $itemLevel;
        $this->inventoryId = $inventoryId;
        $this->name = $name;
        $this->icon = $icon;
        $this->price = $price;
        $this->minLevel = $minLevel;
        $this->minStrength = $minStrength;
        $this->minDexterity = $minDexterity;
        $this->minIntelligence = $minIntelligence;
        $this->propertyInfo = $propertyInfo;
        $this->magicPropertyInfo = $magicPropertyInfo;
        $this->type = $type;
        $this->magicQuality = $magicQuality;
        $this->base = $base;
        $this->offense = $offense;
        $this->defense = $defense;
        $this->equipType = $equipType;
        $this->sectionType = $sectionType;
        $this->armorType = $armorType;
        $this->potionType = $potionType;
        $this->magicType = $magicType;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDbId(): int
    {
        return $this->dbId;
    }

    public function getItemLevel(): int
    {
        return $this->itemLevel;
    }

    public function getInventoryId(): string
    {
        return $this->inventoryId;
    }

    public function getName(TranslatorInterface $translator): string
    {
        $name = [];
        $params = explode('|', $this->name);

        foreach ($params as $param) {
            $name[] = $translator->trans($param);
        }

        return trim(implode(' ', $name));
    }

    public function getNameSource(): string
    {
        return $this->name;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getMinLevel(): int
    {
        return $this->minLevel;
    }

    public function getMinStrength(): int
    {
        return $this->minStrength;
    }

    public function getMinDexterity(): int
    {
        return $this->minDexterity;
    }

    public function getMinIntelligence(): int
    {
        return $this->minIntelligence;
    }

    public function getPropertyInfo(): string
    {
        return $this->propertyInfo;
    }

    public function getMagicPropertyInfo(): string
    {
        return $this->magicPropertyInfo;
    }

    /**
     * @param TranslatorInterface $translator
     * @param int $characterStrength
     * @param int $characterDexterity
     * @param int $characterIntelligence
     * @return string
     */
    public function getDescription(
        TranslatorInterface $translator,
        int $characterStrength,
        int $characterDexterity,
        int $characterIntelligence
    ): string
    {
        if ($this->propertyInfo === '') {
            return '';
        }

        $desc = '';
        $params = explode('|', $this->propertyInfo);

        foreach ($params as $param) {
            $p = explode('#', $param);

            if ($p[0] === 'offense.attackSpeed' || $p[0] === 'offense.castSpeed') {
                $desc .= '<div class="item_d_pl"><p>' . $translator->trans($p[0]) . '</p></div><div class="item_d_pr"><p>' . ($p[1] / 100) . '</p></div>';
            } elseif ($p[0] === 'offense.criticalStun' || $p[0] === 'offense.criticalBleeding') {
                $desc .= '<div class="item_d_w"><p>' . $translator->trans($p[0]) . '</p></div>';
            } else {
                $desc .= '<div class="item_d_pl"><p>' . $translator->trans($p[0]) . '</p></div><div class="item_d_pr"><p>' . $p[1] . '</p></div>';
            }
        }

        $minStrength = $this->minStrength > $characterStrength ? '<span class="red">' . $this->minStrength . '</span>' : $this->minStrength;
        $minDexterity = $this->minDexterity > $characterDexterity ? '<span class="red">' . $this->minDexterity . '</span>' : $this->minDexterity;
        $minIntelligence = $this->minIntelligence > $characterIntelligence ? '<span class="red">' . $this->minIntelligence . '</span>' : $this->minIntelligence;

        if ($this->minStrength > 0) {
            $desc .= '<div class="item_d_pl"><p>' . $translator->trans('Min strength') . '</p></div><div class="item_d_pr"><p>' . $minStrength . '</p></div>';
        }
        if ($this->minDexterity > 0) {
            $desc .= '<div class="item_d_pl"><p>' . $translator->trans('Min dexterity') . '</p></div><div class="item_d_pr"><p>' . $minDexterity . '</p></div>';
        }
        if ($this->minIntelligence> 0) {
            $desc .= '<div class="item_d_pl"><p>' . $translator->trans('Min intelligence') . '</p></div><div class="item_d_pr"><p>' . $minIntelligence . '</p></div>';
        }

        return $desc;
    }

    /**
     * @param TranslatorInterface $translator
     * @return string
     */
    public function getMagicDescription(TranslatorInterface $translator): string
    {
        if ($this->magicPropertyInfo === '') {
            return '';
        }

        $mods = [];
        $allMaxResist = $this->getAllMaxResistValue();

        $desc = '';
        $params = explode('|', $this->magicPropertyInfo);

        foreach ($params as $param) {
            $p = explode('#', $param);
            $v = explode('.', $p[1]);

            if (array_key_exists($p[0], $mods)) {
                $mods[$p[0]]['value'] += $v[1];
            } else {
                $mods[$p[0]] = [
                    'name'   => $p[0],
                    'prefix' => $v[0],
                    'value'  => $v[1],
                    'suffix' => $v[2],
                ];
            }
        }

        foreach ($mods as $mod) {
            if ($mod['value'] === 0) {
                continue;
            }

            if (
                $allMaxResist > 0 &&
                (
                    $mod['name'] === '^defense.physicalMaxResist' ||
                    $mod['name'] === '^defense.fireMaxResist' ||
                    $mod['name'] === '^defense.waterMaxResist' ||
                    $mod['name'] === '^defense.airMaxResist' ||
                    $mod['name'] === '^defense.earthMaxResist' ||
                    $mod['name'] === '^defense.lifeMaxResist' ||
                    $mod['name'] === '^defense.deathMaxResist'
                )
            ) {
                continue;
            }

            $unique = false;

            if (str_starts_with($mod['name'], '^')) {
                $unique = true;
                $mod['name'] = mb_substr($mod['name'], 1);
            }

            $class = $unique ? 'item_d_r' : 'item_d_m';
            $desc .= '<p class="' . $class . '">' . $translator->trans($mod['name']) . ' '. $mod['prefix'] . $mod['value'] . $mod['suffix'] . '</p>';
        }

        if ($allMaxResist) {
            $desc .= '<p class="item_d_r">' . $translator->trans('defense.allMaxResist') . ' +' . $allMaxResist . '%</p>';
        }

        return $desc . '<div class="item_d_line"></div>';
    }

    public function getType(): ItemTypeInterface
    {
        return $this->type;
    }

    public function getMagicQuality(): MagicQualityInterface
    {
        return $this->magicQuality;
    }

    public function getBase(): BaseInterface
    {
        return $this->base;
    }

    public function getOffense(): OffenseInterface
    {
        return $this->offense;
    }

    public function getDefense(): DefenseInterface
    {
        return $this->defense;
    }

    public function getEquipType(): ?EquipTypeInterface
    {
        return $this->equipType;
    }

    public function getSectionType(): ?SectionTypeInterface
    {
        return $this->sectionType;
    }

    public function getArmorType(): ?ArmorTypeInterface
    {
        return $this->armorType;
    }

    public function getPotionType(): ?PotionTypeInterface
    {
        return $this->potionType;
    }

    public function getMagicType(): ?MagicTypeInterface
    {
        return $this->magicType;
    }

    public function isTwoHandWeapon(): bool
    {
        if (!$this->offense->getWeaponType()) {
            return false;
        }

        $twoHandWeapons = [
            WeaponTypeInterface::BOW,
            WeaponTypeInterface::STAFF,
            WeaponTypeInterface::TWO_HAND_SWORD,
            WeaponTypeInterface::TWO_HAND_AXE,
            WeaponTypeInterface::TWO_HAND_MACE,
            WeaponTypeInterface::TWO_HAND_HEAVY_SWORD,
            WeaponTypeInterface::TWO_HAND_HEAVY_AXE,
            WeaponTypeInterface::TWO_HAND_HEAVY_MACE,
            WeaponTypeInterface::LANCE,
            WeaponTypeInterface::CROSSBOW,
        ];

        return in_array($this->offense->getWeaponType()->getId(), $twoHandWeapons, true);
    }

    public function isShadow(): bool
    {
        return $this->shadow;
    }

    public function shadow(): void
    {
        $this->shadow = true;
    }

    public function getTypeDescription(TranslatorInterface $translator): string
    {
        if ($this->type->getId() === ItemTypeInterface::POTION) {
            return $translator->trans('Potion');
        }

        if ($this->type->getId() === ItemTypeInterface::MATERIAL) {
            return $translator->trans('Material');
        }

        if ($this->offense->getWeaponType()) {
            return $translator->trans($this->offense->getWeaponType()->getName()) . ' (' . $translator->trans($this->getMagicQuality()->getName()) . ')';
        }

        if ($this->armorType) {
            return $translator->trans($this->sectionType->getName()) . ' (' . $translator->trans($this->getMagicQuality()->getName()) . ')';
        }

        return $translator->trans('Book');
    }

    /**
     * @param StatCollection $stats
     * @param float $itemQuality
     * @param float $materialQuality
     * @throws ItemException
     */
    public function applyStats(StatCollection $stats, float $itemQuality, float $materialQuality): void
    {
        $info = '';

        foreach ($stats as $stat) {
            $p = explode('.', $stat->getName());

            $group = 'get' . ucfirst($p[0]);
            $method = 'add' . ucfirst($p[1]);
            $value = $stat->getValue();

            if ($stat->isQuality()) {
                $value = (int)($value * $itemQuality * $materialQuality);
            }

            if (!method_exists($this, $group)) {
                throw new ItemException(ItemException::METHOD_NOT_FOUND . ': ' . $group);
            }

            if (!method_exists($this->$group(), $method)) {
                throw new ItemException(ItemException::METHOD_NOT_FOUND . ': ' . $method);
            }

            $this->$group()->$method($value);

            $info .= "{$stat->getName()}#{$stat->getPrefix()}{$value}{$stat->getSuffix()}|";
        }

        $this->propertyInfo = mb_substr($info, 0, -1);
    }

    /**
     * @param AffixCollection $affixes
     * @param float $itemQuality
     * @param float $materialQuality
     * @throws Exception
     */
    public function applyAffixes(AffixCollection $affixes, float $itemQuality, float $materialQuality): void
    {
        $info = '';

        foreach ($affixes as $affix) {

            if ($affix->getRequiredLevel() > $this->minLevel) {
                $this->minLevel = $affix->getRequiredLevel();
            }

            $this->price += (int)($affix->getPrice() * $itemQuality * $materialQuality);

            foreach ($affix->getMods() as $mod) {
                $p = explode('.', $mod->getName());
                $group = 'get' . ucfirst($p[0]);
                $method = 'add' . ucfirst($p[1]);

                if ($mod->getMinValue() < 0 && $mod->getMaxValue() < 0) {
                    $value = random_int(abs($mod->getMinValue()), abs($mod->getMaxValue()));
                    $value = -$value;
                } else {
                    $value = random_int($mod->getMinValue(), $mod->getMaxValue());
                }

                $namePrefix = $affix->isUnique() ? '^' : '';
                $info .= "$namePrefix{$mod->getName()}#{$mod->getPrefix()}.{$value}.{$mod->getSuffix()}|";

                // todo check exist methods

                $this->$group()->$method($value);
            }
        }

        $this->magicPropertyInfo = mb_substr($info, 0, -1);
    }

    /**
     * @return int
     */
    private function getAllMaxResistValue(): int
    {
        if (
            $this->defense->getPhysicalMaxResist() > 0 &&
            $this->defense->getFireMaxResist() === $this->defense->getPhysicalMaxResist() &&
            $this->defense->getWaterMaxResist() === $this->defense->getPhysicalMaxResist() &&
            $this->defense->getAirMaxResist() === $this->defense->getPhysicalMaxResist() &&
            $this->defense->getEarthMaxResist() === $this->defense->getPhysicalMaxResist() &&
            $this->defense->getLifeMaxResist() === $this->defense->getPhysicalMaxResist() &&
            $this->defense->getDeathMaxResist() === $this->defense->getPhysicalMaxResist()
        ) {
            return $this->defense->getPhysicalMaxResist();
        }

        return 0;
    }
}
