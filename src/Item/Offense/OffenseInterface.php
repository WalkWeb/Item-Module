<?php

declare(strict_types=1);

namespace Item\Offense;

use Item\Type\Damage\DamageTypeInterface;
use Item\Type\Weapon\WeaponTypeInterface;

interface OffenseInterface
{
    public function getWeaponType(): ?WeaponTypeInterface;
    public function getDamageType(): ?DamageTypeInterface;
    public function getPhysicalDamage(): int;
    public function addPhysicalDamage(int $physicalDamage): void;
    public function getFireDamage(): int;
    public function addFireDamage(int $fireDamage): void;
    public function getWaterDamage(): int;
    public function addWaterDamage(int $waterDamage): void;
    public function getAirDamage(): int;
    public function addAirDamage(int $airDamage): void;
    public function getEarthDamage(): int;
    public function addEarthDamage(int $earthDamage): void;
    public function getLifeDamage(): int;
    public function addLifeDamage(int $lifeDamage): void;
    public function getDeathDamage(): int;
    public function addDeathDamage(int $deathDamage): void;
    public function getIncreasePhysicalDamage(): int;
    public function addIncreasePhysicalDamage(int $increasePhysicalDamage): void;
    public function getIncreaseFireDamage(): int;
    public function addIncreaseFireDamage(int $increaseFireDamage): void;
    public function getIncreaseWaterDamage(): int;
    public function addIncreaseWaterDamage(int $increaseWaterDamage): void;
    public function getIncreaseAirDamage(): int;
    public function addIncreaseAirDamage(int $increaseAirDamage): void;
    public function getIncreaseEarthDamage(): int;
    public function addIncreaseEarthDamage(int $increaseEarthDamage): void;
    public function getIncreaseLifeDamage(): int;
    public function addIncreaseLifeDamage(int $increaseLifeDamage): void;
    public function getIncreaseDeathDamage(): int;
    public function addIncreaseDeathDamage(int $increaseDeathDamage): void;
    public function getAttackSpeed(): int;
    public function addAttackSpeed(int $attackSpeed): void;
    public function getCastSpeed(): int;
    public function addCastSpeed(int $castSpeed): void;
    public function getIncreaseAttackSpeed(): int;
    public function addIncreaseAttackSpeed(int $increaseAttackSpeed): void;
    public function getIncreaseCastSpeed(): int;
    public function addIncreaseCastSpeed(int $increaseCastSpeed): void;
    public function getAccuracy(): int;
    public function addAccuracy(int $accuracy): void;
    public function getMagicAccuracy(): int;
    public function addMagicAccuracy(int $magicAccuracy): void;
    public function getIncreaseAccuracy(): int;
    public function addIncreaseAccuracy(int $increaseAccuracy): void;
    public function getIncreaseMagicAccuracy(): int;
    public function addIncreaseMagicAccuracy(int $increaseMagicAccuracy): void;
    public function getBlockIgnore(): int;
    public function addBlockIgnore(int $blockIgnore): void;
    public function getCriticalChance(): int;
    public function addCriticalChance(int $criticalChance): void;
    public function getCriticalMultiplier(): int;
    public function addCriticalMultiplier(int $criticalMultiplier): void;
    public function getIncreaseCriticalChance(): int;
    public function addIncreaseCriticalChance(int $increaseCriticalChance): void;
    public function getDamageMultiplier(): int;
    public function addDamageMultiplier(int $damageMultiplier): void;
    public function getVampirism(): int;
    public function addVampirism(int $vampirism): void;
    public function getMagicVampirism(): int;
    public function addMagicVampirism(int $magicVampirism): void;
    public function getCriticalStun(): int;
    public function addCriticalStun(int $criticalStun): void;
    public function getCriticalBleeding(): int;
    public function addCriticalBleeding(int $criticalBleeding): void;
}
