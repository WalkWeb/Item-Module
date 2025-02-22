<?php

declare(strict_types=1);

namespace Tests\Item\Offense;

use Item\Offense\Offense;
use Item\Type\Damage\DamageType;
use Item\Type\Damage\DamageTypeInterface;
use Item\Type\Weapon\WeaponType;
use Item\Type\Weapon\WeaponTypeInterface;
use PHPUnit\Framework\TestCase;

class OffenseTest extends TestCase
{
    public function testOffense(): void
    {
        $weaponType = new WeaponType(WeaponTypeInterface::SWORD);
        $damageType = new DamageType(DamageTypeInterface::ATTACK);
        $offense = new Offense($weaponType, $damageType);

        self::assertEquals($weaponType, $offense->getWeaponType());
        self::assertEquals($damageType, $offense->getDamageType());
        self::assertEquals(0, $offense->getPhysicalDamage());
        self::assertEquals(0, $offense->getFireDamage());
        self::assertEquals(0, $offense->getWaterDamage());
        self::assertEquals(0, $offense->getAirDamage());
        self::assertEquals(0, $offense->getEarthDamage());
        self::assertEquals(0, $offense->getLifeDamage());
        self::assertEquals(0, $offense->getDeathDamage());
        self::assertEquals(0, $offense->getIncreasePhysicalDamage());
        self::assertEquals(0, $offense->getIncreaseFireDamage());
        self::assertEquals(0, $offense->getIncreaseWaterDamage());
        self::assertEquals(0, $offense->getIncreaseAirDamage());
        self::assertEquals(0, $offense->getIncreaseEarthDamage());
        self::assertEquals(0, $offense->getIncreaseLifeDamage());
        self::assertEquals(0, $offense->getIncreaseDeathDamage());
        self::assertEquals(0.0, $offense->getAttackSpeed());
        self::assertEquals(0.0, $offense->getCastSpeed());
        self::assertEquals(0, $offense->getIncreaseAttackSpeed());
        self::assertEquals(0, $offense->getIncreaseCastSpeed());
        self::assertEquals(0, $offense->getAccuracy());
        self::assertEquals(0, $offense->getMagicAccuracy());
        self::assertEquals(0, $offense->getIncreaseAccuracy());
        self::assertEquals(0, $offense->getIncreaseMagicAccuracy());
        self::assertEquals(0, $offense->getBlockIgnore());
        self::assertEquals(0, $offense->getCriticalChance());
        self::assertEquals(0, $offense->getCriticalMultiplier());
        self::assertEquals(0, $offense->getIncreaseCriticalChance());
        self::assertEquals(0, $offense->getDamageMultiplier());
        self::assertEquals(0, $offense->getVampirism());
        self::assertEquals(0, $offense->getMagicVampirism());
        self::assertEquals(0, $offense->getCriticalStun());
        self::assertEquals(0, $offense->getCriticalBleeding());

        $physicalDamage = 100;
        $fireDamage = 95;
        $waterDamage = 90;
        $airDamage = 85;
        $earthDamage = 80;
        $lifeDamage = 75;
        $deathDamage = 70;
        $increasePhysicalDamage = 200;
        $increaseFireDamage = 201;
        $increaseWaterDamage = 202;
        $increaseAirDamage = 203;
        $increaseEarthDamage = 204;
        $increaseLifeDamage = 205;
        $increaseDeathDamage = 206;
        $attackSpeed = 130;
        $castSpeed = 50;
        $increaseAttackSpeed = 250;
        $increaseCastSpeed = 240;
        $accuracy = 500;
        $magicAccuracy = 300;
        $increaseAccuracy = 270;
        $increaseMagicAccuracy = 280;
        $blockIgnoring = 99;
        $criticalChance = 200;
        $criticalMultiplier = 350;
        $increaseCriticalChance = 335;
        $damageMultiplier = 10;
        $vampirism = 20;
        $magicVampirism = 15;
        $criticalStun = 1;
        $criticalBleeding = 2;

        $offense->addPhysicalDamage($physicalDamage);
        $offense->addFireDamage($fireDamage);
        $offense->addWaterDamage($waterDamage);
        $offense->addAirDamage($airDamage);
        $offense->addEarthDamage($earthDamage);
        $offense->addLifeDamage($lifeDamage);
        $offense->addDeathDamage($deathDamage);
        $offense->addIncreasePhysicalDamage($increasePhysicalDamage);
        $offense->addIncreaseFireDamage($increaseFireDamage);
        $offense->addIncreaseWaterDamage($increaseWaterDamage);
        $offense->addIncreaseAirDamage($increaseAirDamage);
        $offense->addIncreaseEarthDamage($increaseEarthDamage);
        $offense->addIncreaseLifeDamage($increaseLifeDamage);
        $offense->addIncreaseDeathDamage($increaseDeathDamage);
        $offense->addAttackSpeed($attackSpeed);
        $offense->addCastSpeed($castSpeed);
        $offense->addIncreaseAttackSpeed($increaseAttackSpeed);
        $offense->addIncreaseCastSpeed($increaseCastSpeed);
        $offense->addAccuracy($accuracy);
        $offense->addMagicAccuracy($magicAccuracy);
        $offense->addIncreaseAccuracy($increaseAccuracy);
        $offense->addIncreaseMagicAccuracy($increaseMagicAccuracy);
        $offense->addBlockIgnore($blockIgnoring);
        $offense->addCriticalChance($criticalChance);
        $offense->addCriticalMultiplier($criticalMultiplier);
        $offense->addIncreaseCriticalChance($increaseCriticalChance);
        $offense->addDamageMultiplier($damageMultiplier);
        $offense->addVampirism($vampirism);
        $offense->addMagicVampirism($magicVampirism);
        $offense->addCriticalStun($criticalStun);
        $offense->addCriticalBleeding($criticalBleeding);

        self::assertEquals($damageType, $offense->getDamageType());
        self::assertEquals($physicalDamage, $offense->getPhysicalDamage());
        self::assertEquals($fireDamage, $offense->getFireDamage());
        self::assertEquals($waterDamage, $offense->getWaterDamage());
        self::assertEquals($airDamage, $offense->getAirDamage());
        self::assertEquals($earthDamage, $offense->getEarthDamage());
        self::assertEquals($lifeDamage, $offense->getLifeDamage());
        self::assertEquals($increasePhysicalDamage, $offense->getIncreasePhysicalDamage());
        self::assertEquals($increaseFireDamage, $offense->getIncreaseFireDamage());
        self::assertEquals($increaseWaterDamage, $offense->getIncreaseWaterDamage());
        self::assertEquals($increaseAirDamage, $offense->getIncreaseAirDamage());
        self::assertEquals($increaseEarthDamage, $offense->getIncreaseEarthDamage());
        self::assertEquals($increaseLifeDamage, $offense->getIncreaseLifeDamage());
        self::assertEquals($increaseDeathDamage, $offense->getIncreaseDeathDamage());
        self::assertEquals($deathDamage, $offense->getDeathDamage());
        self::assertEquals($attackSpeed, $offense->getAttackSpeed());
        self::assertEquals($castSpeed, $offense->getCastSpeed());
        self::assertEquals($increaseAttackSpeed, $offense->getIncreaseAttackSpeed());
        self::assertEquals($increaseCastSpeed, $offense->getIncreaseCastSpeed());
        self::assertEquals($accuracy, $offense->getAccuracy());
        self::assertEquals($magicAccuracy, $offense->getMagicAccuracy());
        self::assertEquals($increaseAccuracy, $offense->getIncreaseAccuracy());
        self::assertEquals($increaseMagicAccuracy, $offense->getIncreaseMagicAccuracy());
        self::assertEquals($blockIgnoring, $offense->getBlockIgnore());
        self::assertEquals($criticalChance, $offense->getCriticalChance());
        self::assertEquals($criticalMultiplier, $offense->getCriticalMultiplier());
        self::assertEquals($increaseCriticalChance, $offense->getIncreaseCriticalChance());
        self::assertEquals($damageMultiplier, $offense->getDamageMultiplier());
        self::assertEquals($vampirism, $offense->getVampirism());
        self::assertEquals($magicVampirism, $offense->getMagicVampirism());
        self::assertEquals($criticalStun, $offense->getCriticalStun());
        self::assertEquals($criticalBleeding, $offense->getCriticalBleeding());
    }
}
