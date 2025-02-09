<?php

declare(strict_types=1);

namespace Tests\Item\Base;

use Item\Base\Base;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    public function testBase(): void
    {
        $base = new Base();

        self::assertEquals(0, $base->getStrength());
        self::assertEquals(0, $base->getDexterity());
        self::assertEquals(0, $base->getIntelligence());
        self::assertEquals(0, $base->getWill());
        self::assertEquals(0, $base->getEndurance());
        self::assertEquals(0, $base->getPercipience());
        self::assertEquals(0, $base->getCharisma());
        self::assertEquals(0, $base->getLuck());
        self::assertEquals(0, $base->getHp());
        self::assertEquals(0, $base->getIncreaseHp());
        self::assertEquals(0, $base->getMana());
        self::assertEquals(0, $base->getIncreaseMana());
        self::assertEquals(0, $base->getStamina());
        self::assertEquals(0, $base->getMaxHorror());
        self::assertEquals(0, $base->getHpRegen());
        self::assertEquals(0, $base->getManaRegen());
        self::assertEquals(0, $base->getAddConcentration());
        self::assertEquals(0, $base->getAddCunning());
        self::assertEquals(0, $base->getAddRage());
        self::assertEquals(0, $base->getIncreaseGold());
        self::assertEquals(0, $base->getStaminaCost());
        self::assertEquals(0, $base->getWeight());

        $strength = 10;
        $dexterity = 11;
        $intelligence = 12;
        $will = 13;
        $endurance = 14;
        $percipience = 15;
        $charisma = 16;
        $luck = 17;
        $hp = 500;
        $increaseHp = 50;
        $mana = 400;
        $increaseMana = 40;
        $stamina = 300;
        $maxHorror = 200;
        $hpRegen = 5;
        $manaRegen = 4;
        $addConcentration = 50;
        $addCunning = 55;
        $addRage = 58;
        $increaseGold = 1001;
        $staminaCost = 1002;
        $weight = 1003;

        $base->addStrength($strength);
        $base->addDexterity($dexterity);
        $base->addIntelligence($intelligence);
        $base->addWill($will);
        $base->addEndurance($endurance);
        $base->addPercipience($percipience);
        $base->addCharisma($charisma);
        $base->addLuck($luck);
        $base->addHp($hp);
        $base->addIncreaseHp($increaseHp);
        $base->addMana($mana);
        $base->addIncreaseMana($increaseMana);
        $base->addStamina($stamina);
        $base->addMaxHorror($maxHorror);
        $base->addHpRegen($hpRegen);
        $base->addManaRegen($manaRegen);
        $base->addAddConcentration($addConcentration);
        $base->addAddCunning($addCunning);
        $base->addAddRage($addRage);
        $base->addIncreaseGold($increaseGold);
        $base->addStaminaCost($staminaCost);
        $base->addWeight($weight);

        self::assertEquals($strength, $base->getStrength());
        self::assertEquals($dexterity, $base->getDexterity());
        self::assertEquals($intelligence, $base->getIntelligence());
        self::assertEquals($will, $base->getWill());
        self::assertEquals($endurance, $base->getEndurance());
        self::assertEquals($percipience, $base->getPercipience());
        self::assertEquals($charisma, $base->getCharisma());
        self::assertEquals($luck, $base->getLuck());
        self::assertEquals($hp, $base->getHp());
        self::assertEquals($increaseHp, $base->getIncreaseHp());
        self::assertEquals($mana, $base->getMana());
        self::assertEquals($increaseMana, $base->getIncreaseMana());
        self::assertEquals($stamina, $base->getStamina());
        self::assertEquals($maxHorror, $base->getMaxHorror());
        self::assertEquals($hpRegen, $base->getHpRegen());
        self::assertEquals($manaRegen, $base->getManaRegen());
        self::assertEquals($addConcentration, $base->getAddConcentration());
        self::assertEquals($addCunning, $base->getAddCunning());
        self::assertEquals($addRage, $base->getAddRage());
        self::assertEquals($increaseGold, $base->getIncreaseGold());
        self::assertEquals($staminaCost, $base->getStaminaCost());
        self::assertEquals($weight, $base->getWeight());
    }
}
