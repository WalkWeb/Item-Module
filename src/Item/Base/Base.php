<?php

declare(strict_types=1);

namespace Item\Base;

class Base implements BaseInterface
{
    private int $strength = 0;
    private int $dexterity = 0;
    private int $intelligence = 0;
    private int $will = 0;
    private int $endurance = 0;
    private int $percipience = 0;
    private int $charisma = 0;
    private int $luck = 0;
    private int $hp = 0; // todo life
    private int $increaseHp = 0; // todo increasedLife
    private int $mana = 0;
    private int $increaseMana = 0;
    private int $stamina = 0;
    private int $maxHorror = 0;
    private int $hpRegen = 0;
    private int $manaRegen = 0;
    private int $addConcentration = 0;
    private int $addCunning = 0;
    private int $addRage = 0;
    private int $increaseGold = 0;
    private int $staminaCost = 0;
    private int $weight = 0;

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

    public function getHp(): int
    {
        return $this->hp;
    }

    public function addHp(int $hp): void
    {
        $this->hp += $hp;
    }

    public function getIncreaseHp(): int
    {
        return $this->increaseHp;
    }

    public function addIncreaseHp(int $increaseHp): void
    {
        $this->increaseHp += $increaseHp;
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

    public function getHpRegen(): int
    {
        return $this->hpRegen;
    }

    public function addHpRegen(int $hpRegen): void
    {
        $this->hpRegen += $hpRegen;
    }

    public function getManaRegen(): int
    {
        return $this->manaRegen;
    }

    public function addManaRegen(int $manaRegen): void
    {
        $this->manaRegen += $manaRegen;
    }

    public function getAddConcentration(): int
    {
        return $this->addConcentration;
    }

    public function addAddConcentration(int $addConcentration): void
    {
        $this->addConcentration += $addConcentration;
    }

    public function getAddCunning(): int
    {
        return $this->addCunning;
    }

    public function addAddCunning(int $addCunning): void
    {
        $this->addCunning += $addCunning;
    }

    public function getAddRage(): int
    {
        return $this->addRage;
    }

    public function addAddRage(int $addRage): void
    {
        $this->addRage += $addRage;
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

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function addWeight(int $weight): void
    {
        $this->weight += $weight;
    }
}
