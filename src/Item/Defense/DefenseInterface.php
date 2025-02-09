<?php

declare(strict_types=1);

namespace Item\Defense;

interface DefenseInterface
{
    public function getPhysicalResist(): int;
    public function addPhysicalResist(int $physicalResist): void;
    public function getFireResist(): int;
    public function addFireResist(int $fireResist): void;
    public function getWaterResist(): int;
    public function addWaterResist(int $waterResist): void;
    public function getAirResist(): int;
    public function addAirResist(int $airResist): void;
    public function getEarthResist(): int;
    public function addEarthResist(int $earthResist): void;
    public function getLifeResist(): int;
    public function addLifeResist(int $lifeResist): void;
    public function getDeathResist(): int;
    public function addDeathResist(int $deathResist): void;
    public function getDefense(): int;
    public function addDefense(int $defense): void;
    public function getMagicDefense(): int;
    public function addMagicDefense(int $magicDefense): void;
    public function getIncreaseDefense(): int;
    public function addIncreaseDefense(int $increaseDefense): void;
    public function getIncreaseMagicDefense(): int;
    public function addIncreaseMagicDefense(int $increaseMagicDefense): void;
    public function getBlock(): int;
    public function addBlock(int $block): void;
    public function getMagicBlock(): int;
    public function addMagicBlock(int $magicBlock): void;
    public function getMentalBarrier(): int;
    public function addMentalBarrier(int $mentalBarrier): void;
    public function getPhysicalMaxResist(): int;
    public function addPhysicalMaxResist(int $physicalMaxResist): void;
    public function getFireMaxResist(): int;
    public function addFireMaxResist(int $fireMaxResist): void;
    public function getWaterMaxResist(): int;
    public function addWaterMaxResist(int $waterMaxResist): void;
    public function getAirMaxResist(): int;
    public function addAirMaxResist(int $airMaxResist): void;
    public function getEarthMaxResist(): int;
    public function addEarthMaxResist(int $earthMaxResist): void;
    public function getLifeMaxResist(): int;
    public function addLifeMaxResist(int $lifeMaxResist): void;
    public function getDeathMaxResist(): int;
    public function addDeathMaxResist(int $deathMaxResist): void;
    public function getGlobalResist(): int;
    public function addGlobalResist(int $globalResist): void;
    public function getDodge(): int;
    public function addDodge(int $dodge): void;
    public function getAddHidden(): int;
    public function addAddHidden(int $addHidden): void;
}
