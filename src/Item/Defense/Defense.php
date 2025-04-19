<?php

declare(strict_types=1);

namespace Item\Defense;

class Defense implements DefenseInterface
{
    private int $physicalResist;
    private int $fireResist;
    private int $waterResist;
    private int $airResist;
    private int $earthResist;
    private int $lifeResist;
    private int $deathResist;
    private int $defense;
    private int $magicDefense;
    private int $increaseDefense;
    private int $increaseMagicDefense;
    private int $block;
    private int $magicBlock;
    private int $mentalBarrier;
    private int $physicalMaxResist;
    private int $fireMaxResist;
    private int $waterMaxResist;
    private int $airMaxResist;
    private int $earthMaxResist;
    private int $lifeMaxResist;
    private int $deathMaxResist;
    private int $globalResist;
    private int $dodge;
    private int $bonusHidden;

    public function __construct(
        int $physicalResist = 0,
        int $fireResist = 0,
        int $waterResist = 0,
        int $airResist = 0,
        int $earthResist = 0,
        int $lifeResist = 0,
        int $deathResist = 0,
        int $defense = 0,
        int $magicDefense = 0,
        int $increaseDefense = 0,
        int $increaseMagicDefense = 0,
        int $block = 0,
        int $magicBlock = 0,
        int $mentalBarrier = 0,
        int $physicalMaxResist = 0,
        int $fireMaxResist = 0,
        int $waterMaxResist = 0,
        int $airMaxResist = 0,
        int $earthMaxResist = 0,
        int $lifeMaxResist = 0,
        int $deathMaxResist = 0,
        int $globalResist = 0,
        int $dodge = 0,
        int $bonusHidden = 0
    )
    {
        $this->physicalResist = $physicalResist;
        $this->fireResist = $fireResist;
        $this->waterResist = $waterResist;
        $this->airResist = $airResist;
        $this->earthResist = $earthResist;
        $this->lifeResist = $lifeResist;
        $this->deathResist = $deathResist;
        $this->defense = $defense;
        $this->magicDefense = $magicDefense;
        $this->increaseDefense = $increaseDefense;
        $this->increaseMagicDefense = $increaseMagicDefense;
        $this->block = $block;
        $this->magicBlock = $magicBlock;
        $this->mentalBarrier = $mentalBarrier;
        $this->physicalMaxResist = $physicalMaxResist;
        $this->fireMaxResist = $fireMaxResist;
        $this->waterMaxResist = $waterMaxResist;
        $this->airMaxResist = $airMaxResist;
        $this->earthMaxResist = $earthMaxResist;
        $this->lifeMaxResist = $lifeMaxResist;
        $this->deathMaxResist = $deathMaxResist;
        $this->globalResist = $globalResist;
        $this->dodge = $dodge;
        $this->bonusHidden = $bonusHidden;
    }

    public function getPhysicalResist(): int
    {
        return $this->physicalResist;
    }

    public function addPhysicalResist(int $physicalResist): void
    {
        $this->physicalResist += $physicalResist;
    }

    public function getFireResist(): int
    {
        return $this->fireResist;
    }

    public function addFireResist(int $fireResist): void
    {
        $this->fireResist += $fireResist;
    }

    public function getWaterResist(): int
    {
        return $this->waterResist;
    }

    public function addWaterResist(int $waterResist): void
    {
        $this->waterResist += $waterResist;
    }

    public function getAirResist(): int
    {
        return $this->airResist;
    }

    public function addAirResist(int $airResist): void
    {
        $this->airResist += $airResist;
    }

    public function getEarthResist(): int
    {
        return $this->earthResist;
    }

    public function addEarthResist(int $earthResist): void
    {
        $this->earthResist += $earthResist;
    }

    public function getLifeResist(): int
    {
        return $this->lifeResist;
    }

    public function addLifeResist(int $lifeResist): void
    {
        $this->lifeResist += $lifeResist;
    }

    public function getDeathResist(): int
    {
        return $this->deathResist;
    }

    public function addDeathResist(int $deathResist): void
    {
        $this->deathResist += $deathResist;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function addDefense(int $defense): void
    {
        $this->defense += $defense;
    }

    public function getMagicDefense(): int
    {
        return $this->magicDefense;
    }

    public function addMagicDefense(int $magicDefense): void
    {
        $this->magicDefense += $magicDefense;
    }

    public function getIncreaseDefense(): int
    {
        return $this->increaseDefense;
    }

    public function addIncreaseDefense(int $increaseDefense): void
    {
        $this->increaseDefense += $increaseDefense;
    }

    public function getIncreaseMagicDefense(): int
    {
        return $this->increaseMagicDefense;
    }

    public function addIncreaseMagicDefense(int $increaseMagicDefense): void
    {
        $this->increaseMagicDefense += $increaseMagicDefense;
    }

    public function getBlock(): int
    {
        return $this->block;
    }

    public function addBlock(int $block): void
    {
        $this->block += $block;
    }

    public function getMagicBlock(): int
    {
        return $this->magicBlock;
    }

    public function addMagicBlock(int $magicBlock): void
    {
        $this->magicBlock += $magicBlock;
    }

    public function getMentalBarrier(): int
    {
        return $this->mentalBarrier;
    }

    public function addMentalBarrier(int $mentalBarrier): void
    {
        $this->mentalBarrier += $mentalBarrier;
    }

    public function getPhysicalMaxResist(): int
    {
        return $this->physicalMaxResist;
    }

    public function addPhysicalMaxResist(int $physicalMaxResist): void
    {
        $this->physicalMaxResist += $physicalMaxResist;
    }

    public function getFireMaxResist(): int
    {
        return $this->fireMaxResist;
    }

    public function addFireMaxResist(int $fireMaxResist): void
    {
        $this->fireMaxResist += $fireMaxResist;
    }

    public function getWaterMaxResist(): int
    {
        return $this->waterMaxResist;
    }

    public function addWaterMaxResist(int $waterMaxResist): void
    {
        $this->waterMaxResist += $waterMaxResist;
    }

    public function getAirMaxResist(): int
    {
        return $this->airMaxResist;
    }

    public function addAirMaxResist(int $airMaxResist): void
    {
        $this->airMaxResist += $airMaxResist;
    }

    public function getEarthMaxResist(): int
    {
        return $this->earthMaxResist;
    }

    public function addEarthMaxResist(int $earthMaxResist): void
    {
        $this->earthMaxResist += $earthMaxResist;
    }

    public function getLifeMaxResist(): int
    {
        return $this->lifeMaxResist;
    }

    public function addLifeMaxResist(int $lifeMaxResist): void
    {
        $this->lifeMaxResist += $lifeMaxResist;
    }

    public function getDeathMaxResist(): int
    {
        return $this->deathMaxResist;
    }

    public function addDeathMaxResist(int $deathMaxResist): void
    {
        $this->deathMaxResist += $deathMaxResist;
    }

    public function getGlobalResist(): int
    {
        return $this->globalResist;
    }

    public function addGlobalResist(int $globalResist): void
    {
        $this->globalResist += $globalResist;
    }

    public function getDodge(): int
    {
        return $this->dodge;
    }

    public function addDodge(int $dodge): void
    {
        $this->dodge += $dodge;
    }

    public function getBonusHidden(): int
    {
        return $this->bonusHidden;
    }

    public function addBonusHidden(int $addHidden): void
    {
        $this->bonusHidden += $addHidden;
    }

    public function merge(DefenseInterface $defense): void
    {
        $this->physicalResist += $defense->getPhysicalResist();
        $this->fireResist += $defense->getFireResist();
        $this->waterResist += $defense->getWaterResist();
        $this->airResist += $defense->getAirResist();
        $this->earthResist += $defense->getEarthResist();
        $this->lifeResist += $defense->getLifeResist();
        $this->deathResist += $defense->getDeathResist();
        $this->defense += $defense->getDefense();
        $this->magicDefense += $defense->getMagicDefense();
        $this->increaseDefense += $defense->getIncreaseDefense();
        $this->increaseMagicDefense += $defense->getIncreaseMagicDefense();
        $this->block += $defense->getBlock();
        $this->magicBlock += $defense->getMagicBlock();
        $this->mentalBarrier += $defense->getMentalBarrier();
        $this->physicalMaxResist += $defense->getPhysicalMaxResist();
        $this->fireMaxResist += $defense->getFireMaxResist();
        $this->waterMaxResist += $defense->getWaterMaxResist();
        $this->airMaxResist += $defense->getAirMaxResist();
        $this->earthMaxResist += $defense->getEarthMaxResist();
        $this->lifeMaxResist += $defense->getLifeMaxResist();
        $this->deathMaxResist += $defense->getDeathMaxResist();
        $this->globalResist += $defense->getGlobalResist();
        $this->dodge += $defense->getDodge();
        $this->bonusHidden += $defense->getBonusHidden();
    }
}
