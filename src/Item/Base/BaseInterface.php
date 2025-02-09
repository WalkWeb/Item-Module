<?php

declare(strict_types=1);

namespace Item\Base;

interface BaseInterface
{
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
    public function getHp(): int;
    public function addHp(int $hp): void;
    public function getIncreaseHp(): int;
    public function addIncreaseHp(int $increaseHp): void;
    public function getMana(): int;
    public function addMana(int $mana): void;
    public function getIncreaseMana(): int;
    public function addIncreaseMana(int $increaseMana): void;
    public function getStamina(): int;
    public function addStamina(int $stamina): void;
    public function getMaxHorror(): int;
    public function addMaxHorror(int $horror): void;
    public function getHpRegen(): int;
    public function addHpRegen(int $hpRegen): void;
    public function getManaRegen(): int;
    public function addManaRegen(int $manaRegen): void;
    public function getAddConcentration(): int;
    public function addAddConcentration(int $addConcentration): void;
    public function getAddCunning(): int;
    public function addAddCunning(int $addCunning): void;
    public function getAddRage(): int;
    public function addAddRage(int $addRage): void;
    public function getIncreaseGold(): int;
    public function addIncreaseGold(int $increaseGold): void;
    public function getStaminaCost(): int;
    public function addStaminaCost(int $staminaCost): void;
    public function getWeight(): int;
    public function addWeight(int $weight): void;
}
