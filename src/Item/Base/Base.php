<?php

declare(strict_types=1);

namespace Item\Base;

class Base implements BaseInterface
{
    private int $weight;
    private int $strength = 0;
    private int $dexterity = 0;
    private int $intelligence = 0;
    private int $will = 0;
    private int $endurance = 0;
    private int $percipience = 0;
    private int $charisma = 0;
    private int $luck = 0;
    private int $life = 0;
    private int $increaseLife = 0;
    private int $mana = 0;
    private int $increaseMana = 0;
    private int $stamina = 0;
    private int $maxHorror = 0;
    private int $lifeRegen = 0;
    private int $manaRegen = 0;
    private int $bonusConcentration = 0;
    private int $bonusCunning = 0;
    private int $bonusRage = 0;
    private int $increaseGold = 0;
    private int $staminaCost = 0;
    private int $beltSlot = 0;

    public function __construct(int $weight)
    {
        $this->weight = $weight;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function addStrength(int $strength): void
    {
        $this->strength += $strength;
    }

    public function getDexterity(): int
    {
        return $this->dexterity;
    }

    public function addDexterity(int $dexterity): void
    {
        $this->dexterity += $dexterity;
    }

    public function getIntelligence(): int
    {
        return $this->intelligence;
    }

    public function addIntelligence(int $intelligence): void
    {
        $this->intelligence += $intelligence;
    }

    public function getWill(): int
    {
        return $this->will;
    }

    public function addWill(int $will): void
    {
        $this->will += $will;
    }

    public function getEndurance(): int
    {
        return $this->endurance;
    }

    public function addEndurance(int $endurance): void
    {
        $this->endurance += $endurance;
    }

    public function getPercipience(): int
    {
        return $this->percipience;
    }

    public function addPercipience(int $percipience): void
    {
        $this->percipience += $percipience;
    }

    public function getCharisma(): int
    {
        return $this->charisma;
    }

    public function addCharisma(int $charisma): void
    {
        $this->charisma += $charisma;
    }

    public function getLuck(): int
    {
        return $this->luck;
    }

    public function addLuck(int $luck): void
    {
        $this->luck += $luck;
    }

    public function getLife(): int
    {
        return $this->life;
    }

    public function addLife(int $hp): void
    {
        $this->life += $hp;
    }

    public function getIncreaseLife(): int
    {
        return $this->increaseLife;
    }

    public function addIncreaseLife(int $increaseHp): void
    {
        $this->increaseLife += $increaseHp;
    }

    public function getMana(): int
    {
        return $this->mana;
    }

    public function addMana(int $mana): void
    {
        $this->mana += $mana;
    }

    public function getIncreaseMana(): int
    {
        return $this->increaseMana;
    }

    public function addIncreaseMana(int $increaseMana): void
    {
        $this->increaseMana += $increaseMana;
    }

    public function getStamina(): int
    {
        return $this->stamina;
    }

    public function addStamina(int $stamina): void
    {
        $this->stamina += $stamina;
    }

    public function getMaxHorror(): int
    {
        return $this->maxHorror;
    }

    public function addMaxHorror(int $maxHorror): void
    {
        $this->maxHorror += $maxHorror;
    }

    public function getLifeRegen(): int
    {
        return $this->lifeRegen;
    }

    public function addLifeRegen(int $hpRegen): void
    {
        $this->lifeRegen += $hpRegen;
    }

    public function getManaRegen(): int
    {
        return $this->manaRegen;
    }

    public function addManaRegen(int $manaRegen): void
    {
        $this->manaRegen += $manaRegen;
    }

    public function getBonusConcentration(): int
    {
        return $this->bonusConcentration;
    }

    public function addBonusConcentration(int $bonusConcentration): void
    {
        $this->bonusConcentration += $bonusConcentration;
    }

    public function getBonusCunning(): int
    {
        return $this->bonusCunning;
    }

    public function addBonusCunning(int $bonusCunning): void
    {
        $this->bonusCunning += $bonusCunning;
    }

    public function getBonusRage(): int
    {
        return $this->bonusRage;
    }

    public function addBonusRage(int $bonusRage): void
    {
        $this->bonusRage += $bonusRage;
    }

    public function getIncreaseGold(): int
    {
        return $this->increaseGold;
    }

    public function addIncreaseGold(int $increaseGold): void
    {
        $this->increaseGold += $increaseGold;
    }

    public function getStaminaCost(): int
    {
        return $this->staminaCost;
    }

    public function addStaminaCost(int $staminaCost): void
    {
        $this->staminaCost += $staminaCost;
    }

    public function getBeltSlot(): int
    {
        return $this->beltSlot;
    }

    public function addBeltSlot(int $beltSlot): void
    {
        $this->beltSlot += $beltSlot;
    }
}
