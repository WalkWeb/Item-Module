<?php

declare(strict_types=1);

namespace Item\Base;

interface BaseInterface
{
    public function getWeight(): int;
    public function getStrength(): int;
    public function addStrength(int $strength): void;
    public function getDexterity(): int;
    public function addDexterity(int $dexterity): void;
    public function getIntelligence(): int;
    public function addIntelligence(int $intelligence): void;
    public function getWill(): int;
    public function addWill(int $will): void;
    public function getEndurance(): int;
    public function addEndurance(int $endurance): void;
    public function getPercipience(): int;
    public function addPercipience(int $percipience): void;
    public function getCharisma(): int;
    public function addCharisma(int $charisma): void;
    public function getLuck(): int;
    public function addLuck(int $luck): void;
    public function getLife(): int;
    public function addLife(int $hp): void;
    public function getIncreaseLife(): int;
    public function addIncreaseLife(int $increaseHp): void;
    public function getMana(): int;
    public function addMana(int $mana): void;
    public function getIncreaseMana(): int;
    public function addIncreaseMana(int $increaseMana): void;
    public function getStamina(): int;
    public function addStamina(int $stamina): void;
    public function getMaxHorror(): int;
    public function addMaxHorror(int $horror): void;
    public function getLifeRegen(): int;
    public function addLifeRegen(int $hpRegen): void;
    public function getManaRegen(): int;
    public function addManaRegen(int $manaRegen): void;
    public function getBonusConcentration(): int;
    public function addBonusConcentration(int $bonusConcentration): void;
    public function getBonusCunning(): int;
    public function addBonusCunning(int $bonusCunning): void;
    public function getBonusRage(): int;
    public function addBonusRage(int $bonusRage): void;
    public function getIncreaseGold(): int;
    public function addIncreaseGold(int $increaseGold): void;
    public function getStaminaCost(): int;
    public function addStaminaCost(int $staminaCost): void;
    public function getBeltSlot(): int;
    public function addBeltSlot(int $beltSlot): void;

    public function merge(BaseInterface $base): void;
}
