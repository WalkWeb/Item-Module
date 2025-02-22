<?php

declare(strict_types=1);

namespace Item\Defense;

class Defense implements DefenseInterface
{
    private int $physicalResist = 0;
    private int $fireResist = 0;
    private int $waterResist = 0;
    private int $airResist = 0;
    private int $earthResist = 0;
    private int $lifeResist = 0;
    private int $deathResist = 0;
    private int $defense = 0;
    private int $magicDefense = 0;
    private int $increaseDefense = 0;
    private int $increaseMagicDefense = 0;
    private int $block = 0;
    private int $magicBlock = 0;
    private int $mentalBarrier = 0;
    private int $physicalMaxResist = 0;
    private int $fireMaxResist = 0;
    private int $waterMaxResist = 0;
    private int $airMaxResist = 0;
    private int $earthMaxResist = 0;
    private int $lifeMaxResist = 0;
    private int $deathMaxResist = 0;
    private int $globalResist = 0;
    private int $dodge = 0;
    private int $bonusHidden = 0;

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
}
