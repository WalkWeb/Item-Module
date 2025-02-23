<?php

declare(strict_types=1);

namespace Item\Affix\Type;

use Item\ItemException;

class AffixType implements AffixTypeInterface
{
    private static array $map = [
        // base
        self::ADD_LIFE                 => 'addLife',
        self::ADD_MANA                 => 'addMana',
        self::INCREASE_LIFE            => 'increaseLife',
        self::INCREASE_MANA            => 'increaseMana',
        self::ADD_LIFE_REGEN           => 'addLifeRegen',
        self::ADD_MANA_REGEN           => 'addManaRegen',
        self::ADD_STAMINA              => 'addStamina',
        self::ADD_MAX_HORROR           => 'addMaxHorror',
        self::ADD_STRENGTH             => 'addStrength',
        self::ADD_DEXTERITY            => 'addDexterity',
        self::ADD_INTELLIGENCE         => 'addIntelligence',
        self::ADD_WILL                 => 'addWill',
        self::ADD_ENDURANCE            => 'addEndurance',
        self::ADD_PERCIPIENCE          => 'addPercipience',
        self::ADD_CHARISMA             => 'addCharisma',
        self::ADD_LUCK                 => 'addLuck',
        self::ADD_BELT_SLOT            => 'addBeltSlot',
        self::ADD_STAMINA_COST         => 'addStaminaCost',
        self::ADD_BONUS_CONCENTRATION  => 'bonusConcentration',
        self::ADD_BONUS_CUNNING        => 'bonusCunning',
        self::ADD_BONUS_RAGE           => 'bonusRage',
        self::INCREASE_GOLD            => 'increaseGold',
        self::MIGHT                    => 'Might',
        self::MAGIC                    => 'Magic',
        self::BRUTALITY                => 'Brutality',
        self::FRAGILITY                => 'Fragility',

        // offense
        self::ADD_PHYSICAL_DAMAGE      => 'addPhysicalDamage',
        self::ADD_FIRE_DAMAGE          => 'addFireDamage',
        self::ADD_WATER_DAMAGE         => 'addWaterDamage',
        self::ADD_AIR_DAMAGE           => 'addAirDamage',
        self::ADD_EARTH_DAMAGE         => 'addEarthDamage',
        self::ADD_LIFE_DAMAGE          => 'addLifeDamage',
        self::ADD_DEATH_DAMAGE         => 'addDeathDamage',
        self::INCREASE_PHYSICAL_DAMAGE => 'increasePhysicalDamage',
        self::INCREASE_FIRE_DAMAGE     => 'increaseFireDamage',
        self::INCREASE_WATER_DAMAGE    => 'increaseWaterDamage',
        self::INCREASE_AIR_DAMAGE      => 'increaseAirDamage',
        self::INCREASE_EARTH_DAMAGE    => 'increaseEarthDamage',
        self::INCREASE_LIFE_DAMAGE     => 'increaseLifeDamage',
        self::INCREASE_DEATH_DAMAGE    => 'increaseDeathDamage',
        self::ADD_ACCURACY             => 'addAccuracy',
        self::ADD_MAGIC_ACCURACY       => 'addMagicAccuracy',
        self::INCREASE_ACCURACY        => 'increaseAccuracy',
        self::INCREASE_MAGIC_ACCURACY  => 'increaseMagicAccuracy',
        self::INCREASE_ATTACK_SPEED    => 'increaseAttackSpeed',
        self::INCREASE_CAST_SPEED      => 'increaseCastSpeed',
        self::INCREASE_CRITICAL_CHANCE => 'increaseCriticalChance',
        self::ADD_CRITICAL_MULTIPLIER  => 'addCriticalMultiplier',
        self::ADD_BLOCK_IGNORE         => 'addBlockIgnore',
        self::ADD_VAMPIRISM            => 'addVampirism',
        self::ADD_MAGIC_VAMPIRISM      => 'addMagicVampirism',
        self::ADD_DAMAGE_MULTIPLIER    => 'addDamageMultiplier',
        self::DOUBLE_PHYSICAL_DAMAGE   => 'doublePhysicalDamage',
        self::DOUBLE_FIRE_DAMAGE       => 'doubleFireDamage',
        self::DOUBLE_WATER_DAMAGE      => 'doubleWaterDamage',
        self::DOUBLE_AIR_DAMAGE        => 'doubleAirDamage',
        self::DOUBLE_EARTH_DAMAGE      => 'doubleEarthDamage',
        self::DOUBLE_LIFE_DAMAGE       => 'doubleLifeDamage',
        self::DOUBLE_DEATH_DAMAGE      => 'doubleDeathDamage',
        self::MOBILITY                 => 'Mobility',
        self::MAGIC_MOBILITY           => 'Magic Mobility',
        self::BRUTE_FORCE              => 'Brute Force',
        self::FRAGILE_MIND             => 'Fragile Mind',
        self::ENCHANT                  => 'Enchant',

        // defense
        self::ADD_PHYSICAL_RESIST      => 'addPhysicalResist',
        self::ADD_FIRE_RESIST          => 'addFireResist',
        self::ADD_WATER_RESIST         => 'addWaterResist',
        self::ADD_AIR_RESIST           => 'addAirResist',
        self::ADD_EARTH_RESIST         => 'addEarthResist',
        self::ADD_LIFE_RESIST          => 'addLifeResist',
        self::ADD_DEATH_RESIST         => 'addDeathResist',
        self::ADD_MAX_PHYSICAL_RESIST  => 'addMaxPhysicalResists',
        self::ADD_MAX_FIRE_RESIST      => 'addMaxFireResist',
        self::ADD_MAX_WATER_RESIST     => 'addMaxWaterResist',
        self::ADD_MAX_AIR_RESIST       => 'addMaxAirResist',
        self::ADD_MAX_EARTH_RESIST     => 'addMaxEarthResist',
        self::ADD_MAX_LIFE_RESIST      => 'addMaxLifeResist',
        self::ADD_MAX_DEATH_RESIST     => 'addMaxDeathResist',
        self::ADD_MAX_ALL_RESIST       => 'addMaxAllResist',
        self::ADD_DEFENSE              => 'addDefense',
        self::ADD_MAGIC_DEFENSE        => 'addMagicDefense',
        self::INCREASE_DEFENSE         => 'increaseDefense',
        self::INCREASE_MAGIC_DEFENSE   => 'increaseMagicDefense',
        self::ADD_BLOCK                => 'addBlock',
        self::ADD_MAGIC_BLOCK          => 'addMagicBlock',
        self::ADD_MENTAL_BARRIER       => 'addMentalBarrier',
        self::ADD_GLOBAL_RESIST        => 'addGlobalResist',
        self::ADD_DODGE                => 'addDodge',
        self::ADD_HIDDEN               => 'addHidden',
    ];

    private int $id;

    private string $name;

    /**
     * @param int $id
     * @throws ItemException
     */
    public function __construct(int $id)
    {
        $this->id = $id;
        $this->setName($id);
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
     * @param int $id
     * @throws ItemException
     */
    private function setName(int $id): void
    {
        if (!array_key_exists($id, self::$map)) {
            throw new ItemException(ItemException::UNKNOWN_AFFIX_TYPE . ': ' . $id);
        }

        $this->name = self::$map[$id];
    }
}
