<?php

declare(strict_types=1);

namespace Tests\Item\Defense;

use Item\Defense\Defense;
use PHPUnit\Framework\TestCase;

class DefenseTest extends TestCase
{
    public function testDefense(): void
    {
        $defense = new Defense();

        self::assertEquals(0, $defense->getPhysicalResist());
        self::assertEquals(0, $defense->getFireResist());
        self::assertEquals(0, $defense->getWaterResist());
        self::assertEquals(0, $defense->getAirResist());
        self::assertEquals(0, $defense->getEarthResist());
        self::assertEquals(0, $defense->getLifeResist());
        self::assertEquals(0, $defense->getDeathResist());
        self::assertEquals(0, $defense->getDefense());
        self::assertEquals(0, $defense->getMagicDefense());
        self::assertEquals(0, $defense->getIncreaseDefense());
        self::assertEquals(0, $defense->getIncreaseMagicDefense());
        self::assertEquals(0, $defense->getBlock());
        self::assertEquals(0, $defense->getMagicBlock());
        self::assertEquals(0, $defense->getMentalBarrier());
        self::assertEquals(0, $defense->getPhysicalMaxResist());
        self::assertEquals(0, $defense->getFireMaxResist());
        self::assertEquals(0, $defense->getWaterMaxResist());
        self::assertEquals(0, $defense->getAirMaxResist());
        self::assertEquals(0, $defense->getEarthMaxResist());
        self::assertEquals(0, $defense->getLifeMaxResist());
        self::assertEquals(0, $defense->getDeathMaxResist());
        self::assertEquals(0, $defense->getGlobalResist());
        self::assertEquals(0, $defense->getDodge());
        self::assertEquals(0, $defense->getBonusHidden());

        $physicalResist = 60;
        $fireResist = 61;
        $waterResist = 62;
        $airResist = 63;
        $earthResist = 64;
        $lifeResist = 65;
        $deathResist = 66;
        $defenseValue = 500;
        $increaseDefense = 120;
        $increaseMagicDefense = 130;
        $magicDefense = 400;
        $block = 50;
        $magicBlock = 30;
        $mentalBarrier = 10;
        $physicalMaxResist = 20;
        $fireMaxResist = 21;
        $waterMaxResist = 22;
        $airMaxResist = 23;
        $earthMaxResist = 24;
        $lifeMaxResist = 25;
        $deathMaxResist = 26;
        $globalResist = 15;
        $dodge = 85;
        $bonusHidden = 140;

        $defense->addPhysicalResist($physicalResist);
        $defense->addFireResist($fireResist);
        $defense->addWaterResist($waterResist);
        $defense->addAirResist($airResist);
        $defense->addEarthResist($earthResist);
        $defense->addLifeResist($lifeResist);
        $defense->addDeathResist($deathResist);
        $defense->addDefense($defenseValue);
        $defense->addMagicDefense($magicDefense);
        $defense->addIncreaseDefense($increaseDefense);
        $defense->addIncreaseMagicDefense($increaseMagicDefense);
        $defense->addBlock($block);
        $defense->addMagicBlock($magicBlock);
        $defense->addMentalBarrier($mentalBarrier);
        $defense->addPhysicalMaxResist($physicalMaxResist);
        $defense->addFireMaxResist($fireMaxResist);
        $defense->addWaterMaxResist($waterMaxResist);
        $defense->addAirMaxResist($airMaxResist);
        $defense->addEarthMaxResist($earthMaxResist);
        $defense->addLifeMaxResist($lifeMaxResist);
        $defense->addDeathMaxResist($deathMaxResist);
        $defense->addGlobalResist($globalResist);
        $defense->addDodge($dodge);
        $defense->addBonusHidden($bonusHidden);

        self::assertEquals($physicalResist, $defense->getPhysicalResist());
        self::assertEquals($fireResist, $defense->getFireResist());
        self::assertEquals($waterResist, $defense->getWaterResist());
        self::assertEquals($airResist, $defense->getAirResist());
        self::assertEquals($earthResist, $defense->getEarthResist());
        self::assertEquals($lifeResist, $defense->getLifeResist());
        self::assertEquals($deathResist, $defense->getDeathResist());
        self::assertEquals($defenseValue, $defense->getDefense());
        self::assertEquals($magicDefense, $defense->getMagicDefense());
        self::assertEquals($increaseDefense, $defense->getIncreaseDefense());
        self::assertEquals($increaseMagicDefense, $defense->getIncreaseMagicDefense());
        self::assertEquals($block, $defense->getBlock());
        self::assertEquals($magicBlock, $defense->getMagicBlock());
        self::assertEquals($mentalBarrier, $defense->getMentalBarrier());
        self::assertEquals($physicalMaxResist, $defense->getPhysicalMaxResist());
        self::assertEquals($fireMaxResist, $defense->getFireMaxResist());
        self::assertEquals($waterMaxResist, $defense->getWaterMaxResist());
        self::assertEquals($airMaxResist, $defense->getAirMaxResist());
        self::assertEquals($earthMaxResist, $defense->getEarthMaxResist());
        self::assertEquals($lifeMaxResist, $defense->getLifeMaxResist());
        self::assertEquals($deathMaxResist, $defense->getDeathMaxResist());
        self::assertEquals($globalResist, $defense->getGlobalResist());
        self::assertEquals($dodge, $defense->getDodge());
        self::assertEquals($bonusHidden, $defense->getBonusHidden());
    }
}
