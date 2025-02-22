<?php

declare(strict_types=1);

namespace Item\Offense;

use Item\Type\Damage\DamageTypeInterface;
use Item\Type\Weapon\WeaponTypeInterface;

class Offense implements OffenseInterface
{
    protected ?WeaponTypeInterface $weaponType;
    private ?DamageTypeInterface $damageType;
    private int $physicalDamage = 0;
    private int $fireDamage = 0;
    private int $waterDamage = 0;
    private int $airDamage = 0;
    private int $earthDamage = 0;
    private int $lifeDamage = 0;
    private int $deathDamage = 0;
    private int $increasePhysicalDamage = 0;
    private int $increaseFireDamage = 0;
    private int $increaseWaterDamage = 0;
    private int $increaseAirDamage = 0;
    private int $increaseEarthDamage = 0;
    private int $increaseLifeDamage = 0;
    private int $increaseDeathDamage = 0;
    private int $attackSpeed = 0;
    private int $castSpeed = 0;
    private int $increaseAttackSpeed = 0;
    private int $increaseCastSpeed = 0;
    private int $accuracy = 0;
    private int $magicAccuracy = 0;
    private int $increaseAccuracy = 0;
    private int $increaseMagicAccuracy = 0;
    private int $blockIgnoring = 0;
    private int $criticalChance = 0;
    private int $criticalMultiplier = 0;
    private int $increaseCriticalChance = 0;
    private int $damageMultiplier = 0;
    private int $vampirism = 0;
    private int $magicVampirism = 0;
    private int $criticalStun = 0;
    private int $criticalBleeding = 0;

    public function __construct(?WeaponTypeInterface $weaponType, ?DamageTypeInterface $damageType)
    {
        $this->weaponType = $weaponType;
        $this->damageType = $damageType;
    }

    public function getWeaponType(): ?WeaponTypeInterface
    {
        return $this->weaponType;
    }

    public function getDamageType(): ?DamageTypeInterface
    {
        return $this->damageType;
    }

    public function getPhysicalDamage(): int
    {
        return $this->physicalDamage;
    }

    public function addPhysicalDamage(int $physicalDamage): void
    {
        $this->physicalDamage += $physicalDamage;
    }

    public function getFireDamage(): int
    {
        return $this->fireDamage;
    }

    public function addFireDamage(int $fireDamage): void
    {
        $this->fireDamage += $fireDamage;
    }

    public function getWaterDamage(): int
    {
        return $this->waterDamage;
    }

    public function addWaterDamage(int $waterDamage): void
    {
        $this->waterDamage += $waterDamage;
    }

    public function getAirDamage(): int
    {
        return $this->airDamage;
    }

    public function addAirDamage(int $airDamage): void
    {
        $this->airDamage += $airDamage;
    }

    public function getEarthDamage(): int
    {
        return $this->earthDamage;
    }

    public function addEarthDamage(int $earthDamage): void
    {
        $this->earthDamage += $earthDamage;
    }

    public function getLifeDamage(): int
    {
        return $this->lifeDamage;
    }

    public function addLifeDamage(int $lifeDamage): void
    {
        $this->lifeDamage += $lifeDamage;
    }

    public function getDeathDamage(): int
    {
        return $this->deathDamage;
    }

    public function addDeathDamage(int $deathDamage): void
    {
        $this->deathDamage += $deathDamage;
    }

    public function getIncreasePhysicalDamage(): int
    {
        return $this->increasePhysicalDamage;
    }

    public function addIncreasePhysicalDamage(int $increasePhysicalDamage): void
    {
        $this->increasePhysicalDamage += $increasePhysicalDamage;
    }

    public function getIncreaseFireDamage(): int
    {
        return $this->increaseFireDamage;
    }

    public function addIncreaseFireDamage(int $increaseFireDamage): void
    {
        $this->increaseFireDamage += $increaseFireDamage;
    }

    public function getIncreaseWaterDamage(): int
    {
        return $this->increaseWaterDamage;
    }

    public function addIncreaseWaterDamage(int $increaseWaterDamage): void
    {
        $this->increaseWaterDamage += $increaseWaterDamage;
    }

    public function getIncreaseAirDamage(): int
    {
        return $this->increaseAirDamage;
    }

    public function addIncreaseAirDamage(int $increaseAirDamage): void
    {
        $this->increaseAirDamage += $increaseAirDamage;
    }

    public function getIncreaseEarthDamage(): int
    {
        return $this->increaseEarthDamage;
    }

    public function addIncreaseEarthDamage(int $increaseEarthDamage): void
    {
        $this->increaseEarthDamage += $increaseEarthDamage;
    }

    public function getIncreaseLifeDamage(): int
    {
        return $this->increaseLifeDamage;
    }

    public function addIncreaseLifeDamage(int $increaseLifeDamage): void
    {
        $this->increaseLifeDamage += $increaseLifeDamage;
    }

    public function getIncreaseDeathDamage(): int
    {
        return $this->increaseDeathDamage;
    }

    public function addIncreaseDeathDamage(int $increaseDeathDamage): void
    {
        $this->increaseDeathDamage += $increaseDeathDamage;
    }

    public function getAttackSpeed(): int
    {
        return $this->attackSpeed;
    }

    public function addAttackSpeed(int $attackSpeed): void
    {
        $this->attackSpeed += $attackSpeed;
    }

    public function getCastSpeed(): int
    {
        return $this->castSpeed;
    }

    public function addCastSpeed(int $castSpeed): void
    {
        $this->castSpeed += $castSpeed;
    }

    public function getIncreaseAttackSpeed(): int
    {
        return $this->increaseAttackSpeed;
    }

    public function addIncreaseAttackSpeed(int $increaseAttackSpeed): void
    {
        $this->increaseAttackSpeed += $increaseAttackSpeed;
    }

    public function getIncreaseCastSpeed(): int
    {
        return $this->increaseCastSpeed;
    }

    public function addIncreaseCastSpeed(int $increaseCastSpeed): void
    {
        $this->increaseCastSpeed += $increaseCastSpeed;
    }

    public function getAccuracy(): int
    {
        return $this->accuracy;
    }

    public function addAccuracy(int $accuracy): void
    {
        $this->accuracy += $accuracy;
    }

    public function getMagicAccuracy(): int
    {
        return $this->magicAccuracy;
    }

    public function addMagicAccuracy(int $magicAccuracy): void
    {
        $this->magicAccuracy += $magicAccuracy;
    }

    public function getIncreaseAccuracy(): int
    {
        return $this->increaseAccuracy;
    }

    public function addIncreaseAccuracy(int $increaseAccuracy): void
    {
        $this->increaseAccuracy += $increaseAccuracy;
    }

    public function getIncreaseMagicAccuracy(): int
    {
        return $this->increaseMagicAccuracy;
    }

    public function addIncreaseMagicAccuracy(int $increaseMagicAccuracy): void
    {
        $this->increaseMagicAccuracy += $increaseMagicAccuracy;
    }

    public function getBlockIgnore(): int
    {
        return $this->blockIgnoring;
    }

    public function addBlockIgnore(int $blockIgnore): void
    {
        $this->blockIgnoring += $blockIgnore;
    }

    public function getCriticalChance(): int
    {
        return $this->criticalChance;
    }

    public function addCriticalChance(int $criticalChance): void
    {
        $this->criticalChance += $criticalChance;
    }

    public function getCriticalMultiplier(): int
    {
        return $this->criticalMultiplier;
    }

    public function addCriticalMultiplier(int $criticalMultiplier): void
    {
        $this->criticalMultiplier += $criticalMultiplier;
    }

    public function getIncreaseCriticalChance(): int
    {
        return $this->increaseCriticalChance;
    }

    public function addIncreaseCriticalChance(int $increaseCriticalChance): void
    {
        $this->increaseCriticalChance += $increaseCriticalChance;
    }

    public function getDamageMultiplier(): int
    {
        return $this->damageMultiplier;
    }

    public function addDamageMultiplier(int $damageMultiplier): void
    {
        $this->damageMultiplier += $damageMultiplier;
    }

    public function getVampirism(): int
    {
        return $this->vampirism;
    }

    public function addVampirism(int $vampirism): void
    {
        $this->vampirism += $vampirism;
    }

    public function getMagicVampirism(): int
    {
        return $this->magicVampirism;
    }

    public function addMagicVampirism(int $magicVampirism): void
    {
        $this->magicVampirism += $magicVampirism;
    }

    public function getCriticalStun(): int
    {
        return $this->criticalStun;
    }

    public function addCriticalStun(int $criticalStun): void
    {
        $this->criticalStun += $criticalStun;
    }

    public function getCriticalBleeding(): int
    {
        return $this->criticalBleeding;
    }

    public function addCriticalBleeding(int $criticalBleeding): void
    {
        $this->criticalBleeding += $criticalBleeding;
    }
}
