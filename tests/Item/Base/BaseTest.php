<?php

declare(strict_types=1);

namespace Tests\Item\Base;

use Item\Base\Base;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    public function testBase(): void
    {
        $weight = 1003;

        $base = new Base($weight);

        self::assertEquals(0, $base->getStrength());
        self::assertEquals(0, $base->getDexterity());
        self::assertEquals(0, $base->getIntelligence());
        self::assertEquals(0, $base->getWill());
        self::assertEquals(0, $base->getEndurance());
        self::assertEquals(0, $base->getPercipience());
        self::assertEquals(0, $base->getCharisma());
        self::assertEquals(0, $base->getLuck());
        self::assertEquals(0, $base->getLife());
        self::assertEquals(0, $base->getIncreaseLife());
        self::assertEquals(0, $base->getMana());
        self::assertEquals(0, $base->getIncreaseMana());
        self::assertEquals(0, $base->getStamina());
        self::assertEquals(0, $base->getMaxHorror());
        self::assertEquals(0, $base->getLifeRegen());
        self::assertEquals(0, $base->getManaRegen());
        self::assertEquals(0, $base->getBonusConcentration());
        self::assertEquals(0, $base->getBonusCunning());
        self::assertEquals(0, $base->getBonusRage());
        self::assertEquals(0, $base->getIncreaseGold());
        self::assertEquals(0, $base->getStaminaCost());
        self::assertEquals($weight, $base->getWeight());
        self::assertEquals(0, $base->getBeltSlot());

        $strength = 10;
        $dexterity = 11;
        $intelligence = 12;
        $will = 13;
        $endurance = 14;
        $percipience = 15;
        $charisma = 16;
        $luck = 17;
        $life = 500;
        $increaseLife = 50;
        $mana = 400;
        $increaseMana = 40;
        $stamina = 300;
        $maxHorror = 200;
        $hpRegen = 5;
        $manaRegen = 4;
        $bonusConcentration = 50;
        $bonusCunning = 55;
        $bonusRage = 58;
        $increaseGold = 1001;
        $staminaCost = 1002;
        $beltSlot = 2;

        $base->addStrength($strength);
        $base->addDexterity($dexterity);
        $base->addIntelligence($intelligence);
        $base->addWill($will);
        $base->addEndurance($endurance);
        $base->addPercipience($percipience);
        $base->addCharisma($charisma);
        $base->addLuck($luck);
        $base->addLife($life);
        $base->addIncreaseLife($increaseLife);
        $base->addMana($mana);
        $base->addIncreaseMana($increaseMana);
        $base->addStamina($stamina);
        $base->addMaxHorror($maxHorror);
        $base->addLifeRegen($hpRegen);
        $base->addManaRegen($manaRegen);
        $base->addBonusConcentration($bonusConcentration);
        $base->addBonusCunning($bonusCunning);
        $base->addBonusRage($bonusRage);
        $base->addIncreaseGold($increaseGold);
        $base->addStaminaCost($staminaCost);
        $base->addBeltSlot($beltSlot);

        self::assertEquals($strength, $base->getStrength());
        self::assertEquals($dexterity, $base->getDexterity());
        self::assertEquals($intelligence, $base->getIntelligence());
        self::assertEquals($will, $base->getWill());
        self::assertEquals($endurance, $base->getEndurance());
        self::assertEquals($percipience, $base->getPercipience());
        self::assertEquals($charisma, $base->getCharisma());
        self::assertEquals($luck, $base->getLuck());
        self::assertEquals($life, $base->getLife());
        self::assertEquals($increaseLife, $base->getIncreaseLife());
        self::assertEquals($mana, $base->getMana());
        self::assertEquals($increaseMana, $base->getIncreaseMana());
        self::assertEquals($stamina, $base->getStamina());
        self::assertEquals($maxHorror, $base->getMaxHorror());
        self::assertEquals($hpRegen, $base->getLifeRegen());
        self::assertEquals($manaRegen, $base->getManaRegen());
        self::assertEquals($bonusConcentration, $base->getBonusConcentration());
        self::assertEquals($bonusCunning, $base->getBonusCunning());
        self::assertEquals($bonusRage, $base->getBonusRage());
        self::assertEquals($increaseGold, $base->getIncreaseGold());
        self::assertEquals($staminaCost, $base->getStaminaCost());
        self::assertEquals($beltSlot, $base->getBeltSlot());

        $base->merge(clone $base);

        self::assertEquals($strength * 2, $base->getStrength());
        self::assertEquals($dexterity * 2, $base->getDexterity());
        self::assertEquals($intelligence * 2, $base->getIntelligence());
        self::assertEquals($will * 2, $base->getWill());
        self::assertEquals($endurance * 2, $base->getEndurance());
        self::assertEquals($percipience * 2, $base->getPercipience());
        self::assertEquals($charisma * 2, $base->getCharisma());
        self::assertEquals($luck * 2, $base->getLuck());
        self::assertEquals($life * 2, $base->getLife());
        self::assertEquals($increaseLife * 2, $base->getIncreaseLife());
        self::assertEquals($mana * 2, $base->getMana());
        self::assertEquals($increaseMana * 2, $base->getIncreaseMana());
        self::assertEquals($stamina * 2, $base->getStamina());
        self::assertEquals($maxHorror * 2, $base->getMaxHorror());
        self::assertEquals($hpRegen * 2, $base->getLifeRegen());
        self::assertEquals($manaRegen * 2, $base->getManaRegen());
        self::assertEquals($bonusConcentration * 2, $base->getBonusConcentration());
        self::assertEquals($bonusCunning * 2, $base->getBonusCunning());
        self::assertEquals($bonusRage * 2, $base->getBonusRage());
        self::assertEquals($increaseGold * 2, $base->getIncreaseGold());
        self::assertEquals($staminaCost * 2, $base->getStaminaCost());
        self::assertEquals($beltSlot * 2, $base->getBeltSlot());
    }
}
