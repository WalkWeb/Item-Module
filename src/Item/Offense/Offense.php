<?php

declare(strict_types=1);

namespace Item\Offense;

use Item\ItemException;
use Item\Type\Damage\DamageTypeInterface;
use Item\Type\Weapon\WeaponTypeInterface;

class Offense implements OffenseInterface
{
    protected ?WeaponTypeInterface $weaponType;
    private ?DamageTypeInterface $damageType;
    private int $physicalDamage;
    private int $fireDamage;
    private int $waterDamage;
    private int $airDamage;
    private int $earthDamage;
    private int $lifeDamage;
    private int $deathDamage;
    private int $increasePhysicalDamage;
    private int $increaseFireDamage;
    private int $increaseWaterDamage;
    private int $increaseAirDamage;
    private int $increaseEarthDamage;
    private int $increaseLifeDamage;
    private int $increaseDeathDamage;
    private int $attackSpeed;
    private int $castSpeed;
    private int $increaseAttackSpeed;
    private int $increaseCastSpeed;
    private int $accuracy;
    private int $magicAccuracy;
    private int $increaseAccuracy;
    private int $increaseMagicAccuracy;
    private int $blockIgnoring;
    private int $criticalChance;
    private int $criticalMultiplier;
    private int $increaseCriticalChance;
    private int $damageMultiplier;
    private int $vampirism;
    private int $magicVampirism;
    private int $criticalStun;
    private int $criticalBleeding;

    public function __construct(
        ?WeaponTypeInterface $weaponType = null,
        ?DamageTypeInterface $damageType = null,
        int $physicalDamage = 0,
        int $fireDamage = 0,
        int $waterDamage = 0,
        int $airDamage = 0,
        int $earthDamage = 0,
        int $lifeDamage = 0,
        int $deathDamage = 0,
        int $increasePhysicalDamage = 0,
        int $increaseFireDamage = 0,
        int $increaseWaterDamage = 0,
        int $increaseAirDamage = 0,
        int $increaseEarthDamage = 0,
        int $increaseLifeDamage = 0,
        int $increaseDeathDamage = 0,
        int $attackSpeed = 0,
        int $castSpeed = 0,
        int $increaseAttackSpeed = 0,
        int $increaseCastSpeed = 0,
        int $accuracy = 0,
        int $magicAccuracy = 0,
        int $increaseAccuracy = 0,
        int $increaseMagicAccuracy = 0,
        int $blockIgnoring = 0,
        int $criticalChance = 0,
        int $criticalMultiplier = 0,
        int $increaseCriticalChance = 0,
        int $damageMultiplier = 0,
        int $vampirism = 0,
        int $magicVampirism = 0,
        int $criticalStun = 0,
        int $criticalBleeding = 0
    )
    {
        $this->weaponType = $weaponType;
        $this->damageType = $damageType;
        $this->physicalDamage = $physicalDamage;
        $this->fireDamage = $fireDamage;
        $this->waterDamage = $waterDamage;
        $this->airDamage = $airDamage;
        $this->earthDamage = $earthDamage;
        $this->lifeDamage = $lifeDamage;
        $this->deathDamage = $deathDamage;
        $this->increasePhysicalDamage = $increasePhysicalDamage;
        $this->increaseFireDamage = $increaseFireDamage;
        $this->increaseWaterDamage = $increaseWaterDamage;
        $this->increaseAirDamage = $increaseAirDamage;
        $this->increaseEarthDamage = $increaseEarthDamage;
        $this->increaseLifeDamage = $increaseLifeDamage;
        $this->increaseDeathDamage = $increaseDeathDamage;
        $this->attackSpeed = $attackSpeed;
        $this->castSpeed = $castSpeed;
        $this->increaseAttackSpeed = $increaseAttackSpeed;
        $this->increaseCastSpeed = $increaseCastSpeed;
        $this->accuracy = $accuracy;
        $this->magicAccuracy = $magicAccuracy;
        $this->increaseAccuracy = $increaseAccuracy;
        $this->increaseMagicAccuracy = $increaseMagicAccuracy;
        $this->blockIgnoring = $blockIgnoring;
        $this->criticalChance = $criticalChance;
        $this->criticalMultiplier = $criticalMultiplier;
        $this->increaseCriticalChance = $increaseCriticalChance;
        $this->damageMultiplier = $damageMultiplier;
        $this->vampirism = $vampirism;
        $this->magicVampirism = $magicVampirism;
        $this->criticalStun = $criticalStun;
        $this->criticalBleeding = $criticalBleeding;
    }

    public function getWeaponType(): ?WeaponTypeInterface
    {
        return $this->weaponType;
    }

    public function getDamageType(): ?DamageTypeInterface
    {
        return $this->damageType;
    }

    /**
     * @return WeaponTypeInterface
     * @throws ItemException
     */
    public function getForceWeaponType(): WeaponTypeInterface
    {
        if ($this->weaponType === null) {
            throw new ItemException(OffenseException::MISS_WEAPON_TYPE);
        }

        return $this->weaponType;
    }

    /**
     * @return DamageTypeInterface
     * @throws ItemException
     */
    public function getForceDamageType(): DamageTypeInterface
    {
        if ($this->damageType === null) {
            throw new ItemException(OffenseException::MISS_DAMAGE_TYPE);
        }

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

    public function merge(OffenseInterface $offense): void
    {
        $this->physicalDamage += $offense->getPhysicalDamage();
        $this->fireDamage += $offense->getFireDamage();
        $this->waterDamage += $offense->getWaterDamage();
        $this->airDamage += $offense->getAirDamage();
        $this->earthDamage += $offense->getEarthDamage();
        $this->lifeDamage += $offense->getLifeDamage();
        $this->deathDamage += $offense->getDeathDamage();
        $this->increasePhysicalDamage += $offense->getIncreasePhysicalDamage();
        $this->increaseFireDamage += $offense->getIncreaseFireDamage();
        $this->increaseWaterDamage += $offense->getIncreaseWaterDamage();
        $this->increaseAirDamage += $offense->getIncreaseAirDamage();
        $this->increaseEarthDamage += $offense->getIncreaseEarthDamage();
        $this->increaseLifeDamage += $offense->getIncreaseLifeDamage();
        $this->increaseDeathDamage += $offense->getIncreaseDeathDamage();
        $this->attackSpeed += $offense->getAttackSpeed();
        $this->castSpeed += $offense->getCastSpeed();
        $this->increaseAttackSpeed += $offense->getIncreaseAttackSpeed();
        $this->increaseCastSpeed += $offense->getIncreaseCastSpeed();
        $this->accuracy += $offense->getAccuracy();
        $this->magicAccuracy += $offense->getMagicAccuracy();
        $this->increaseAccuracy += $offense->getIncreaseAccuracy();
        $this->increaseMagicAccuracy += $offense->getIncreaseMagicAccuracy();
        $this->blockIgnoring += $offense->getBlockIgnore();
        $this->criticalChance += $offense->getCriticalChance();
        $this->criticalMultiplier += $offense->getCriticalMultiplier();
        $this->increaseCriticalChance += $offense->getIncreaseCriticalChance();
        $this->damageMultiplier += $offense->getDamageMultiplier();
        $this->vampirism += $offense->getVampirism();
        $this->magicVampirism += $offense->getMagicVampirism();
        $this->criticalStun += $offense->getCriticalStun();
        $this->criticalBleeding += $offense->getCriticalBleeding();
    }
}
