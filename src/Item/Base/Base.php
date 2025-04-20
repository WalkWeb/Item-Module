<?php

declare(strict_types=1);

namespace Item\Base;

class Base implements BaseInterface
{
    private int $weight;
    private int $strength;
    private int $dexterity;
    private int $intelligence;
    private int $will;
    private int $endurance;
    private int $percipience;
    private int $charisma;
    private int $luck;
    private int $life;
    private int $increaseLife;
    private int $mana;
    private int $increaseMana;
    private int $stamina;
    private int $maxHorror;
    private int $lifeRegen;
    private int $manaRegen;
    private int $bonusConcentration;
    private int $bonusCunning;
    private int $bonusRage;
    private int $increaseGold;
    private int $staminaCost;
    private int $beltSlot;

    public function __construct(
        int $weight,
        int $strength = 0,
        int $dexterity = 0,
        int $intelligence = 0,
        int $will = 0,
        int $endurance = 0,
        int $percipience = 0,
        int $charisma = 0,
        int $luck = 0,
        int $life = 0,
        int $increaseLife = 0,
        int $mana = 0,
        int $increaseMana = 0,
        int $stamina = 0,
        int $maxHorror = 0,
        int $lifeRegen = 0,
        int $manaRegen = 0,
        int $bonusConcentration = 0,
        int $bonusCunning = 0,
        int $bonusRage = 0,
        int $increaseGold = 0,
        int $staminaCost = 0,
        int $beltSlot = 0
    )
    {
        $this->weight = $weight;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
        $this->intelligence = $intelligence;
        $this->will = $will;
        $this->endurance = $endurance;
        $this->percipience = $percipience;
        $this->charisma = $charisma;
        $this->luck = $luck;
        $this->life = $life;
        $this->increaseLife = $increaseLife;
        $this->mana = $mana;
        $this->increaseMana = $increaseMana;
        $this->stamina = $stamina;
        $this->maxHorror = $maxHorror;
        $this->lifeRegen = $lifeRegen;
        $this->manaRegen = $manaRegen;
        $this->bonusConcentration = $bonusConcentration;
        $this->bonusCunning = $bonusCunning;
        $this->bonusRage = $bonusRage;
        $this->increaseGold = $increaseGold;
        $this->staminaCost = $staminaCost;
        $this->beltSlot = $beltSlot;
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

    public function merge(BaseInterface $base): void
    {
        $this->weight += $base->getWeight();
        $this->strength += $base->getStrength();
        $this->dexterity += $base->getDexterity();
        $this->intelligence += $base->getIntelligence();
        $this->will += $base->getWill();
        $this->endurance += $base->getEndurance();
        $this->percipience += $base->getPercipience();
        $this->charisma += $base->getCharisma();
        $this->luck += $base->getLuck();
        $this->life += $base->getLife();
        $this->increaseLife += $base->getIncreaseLife();
        $this->mana += $base->getMana();
        $this->increaseMana += $base->getIncreaseMana();
        $this->stamina += $base->getStamina();
        $this->maxHorror += $base->getMaxHorror();
        $this->lifeRegen += $base->getLifeRegen();
        $this->manaRegen += $base->getManaRegen();
        $this->bonusConcentration += $base->getBonusConcentration();
        $this->bonusCunning += $base->getBonusCunning();
        $this->bonusRage += $base->getBonusRage();
        $this->increaseGold += $base->getIncreaseGold();
        $this->staminaCost += $base->getStaminaCost();
        $this->beltSlot += $base->getBeltSlot();
    }
}
