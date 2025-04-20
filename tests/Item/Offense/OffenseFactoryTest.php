<?php

declare(strict_types=1);

namespace Tests\Item\Offense;

use Item\ItemException;
use Item\Offense\OffenseFactory;
use Item\Type\Damage\DamageType;
use Item\Type\Damage\DamageTypeInterface;
use Item\Type\Weapon\WeaponType;
use Item\Type\Weapon\WeaponTypeInterface;
use PHPUnit\Framework\TestCase;

class OffenseFactoryTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param array $data
     * @throws ItemException
     */
    public function testOffenseFactoryCreateSuccess(array $data): void
    {
        $offense = OffenseFactory::create($data);

        if ($data['weapon_type_id']) {
            self::assertEquals($data['weapon_type_id'], $offense->getWeaponType()->getId());
        } else {
            self::assertNull($offense->getWeaponType());
        }

        if ($data['weapon_type_id']) {
            self::assertEquals($data['damage_type_id'], $offense->getDamageType()->getId());
        } else {
            self::assertNull($offense->getDamageType());
        }

        self::assertEquals($data['physical_damage'], $offense->getPhysicalDamage());
        self::assertEquals($data['fire_damage'], $offense->getFireDamage());
        self::assertEquals($data['water_damage'], $offense->getWaterDamage());
        self::assertEquals($data['air_damage'], $offense->getAirDamage());
        self::assertEquals($data['earth_damage'], $offense->getEarthDamage());
        self::assertEquals($data['life_damage'], $offense->getLifeDamage());
        self::assertEquals($data['death_damage'], $offense->getDeathDamage());
        self::assertEquals($data['increase_physical_damage'], $offense->getIncreasePhysicalDamage());
        self::assertEquals($data['increase_fire_damage'], $offense->getIncreaseFireDamage());
        self::assertEquals($data['increase_water_damage'], $offense->getIncreaseWaterDamage());
        self::assertEquals($data['increase_air_damage'], $offense->getIncreaseAirDamage());
        self::assertEquals($data['increase_earth_damage'], $offense->getIncreaseEarthDamage());
        self::assertEquals($data['increase_life_damage'], $offense->getIncreaseLifeDamage());
        self::assertEquals($data['increase_death_damage'], $offense->getIncreaseDeathDamage());
        self::assertEquals($data['attack_speed'], $offense->getAttackSpeed());
        self::assertEquals($data['cast_speed'], $offense->getCastSpeed());
        self::assertEquals($data['increase_attack_speed'], $offense->getIncreaseAttackSpeed());
        self::assertEquals($data['increase_cast_speed'], $offense->getIncreaseCastSpeed());
        self::assertEquals($data['accuracy'], $offense->getAccuracy());
        self::assertEquals($data['magic_accuracy'], $offense->getMagicAccuracy());
        self::assertEquals($data['increase_accuracy'], $offense->getIncreaseAccuracy());
        self::assertEquals($data['increase_magic_accuracy'], $offense->getIncreaseMagicAccuracy());
        self::assertEquals($data['block_ignoring'], $offense->getBlockIgnore());
        self::assertEquals($data['critical_chance'], $offense->getCriticalChance());
        self::assertEquals($data['critical_multiplier'], $offense->getCriticalMultiplier());
        self::assertEquals($data['increase_critical_chance'], $offense->getIncreaseCriticalChance());
        self::assertEquals($data['damage_multiplier'], $offense->getDamageMultiplier());
        self::assertEquals($data['vampirism'], $offense->getVampirism());
        self::assertEquals($data['magic_vampirism'], $offense->getMagicVampirism());
        self::assertEquals($data['critical_stun'], $offense->getCriticalStun());
        self::assertEquals($data['critical_bleeding'], $offense->getCriticalBleeding());
    }

    /**
     * @dataProvider newDataProvider
     * @param WeaponTypeInterface|null $weaponType
     * @param DamageTypeInterface|null $damageType
     */
    public function testOffenseFactoryNew(?WeaponTypeInterface $weaponType, ?DamageTypeInterface $damageType): void
    {
        $offense = OffenseFactory::new($weaponType, $damageType);

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
        self::assertEquals(0, $offense->getAttackSpeed());
        self::assertEquals(0, $offense->getCastSpeed());
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
    }

    // todo fail test

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            // weapon_type_id = null and damage_type_id = null
            [
                [
                    'weapon_type_id'           => null,
                    'damage_type_id'           => null,
                    'physical_damage'          => 1,
                    'fire_damage'              => 2,
                    'water_damage'             => 3,
                    'air_damage'               => 4,
                    'earth_damage'             => 5,
                    'life_damage'              => 6,
                    'death_damage'             => 7,
                    'increase_physical_damage' => 8,
                    'increase_fire_damage'     => 9,
                    'increase_water_damage'    => 10,
                    'increase_air_damage'      => 11,
                    'increase_earth_damage'    => 12,
                    'increase_life_damage'     => 13,
                    'increase_death_damage'    => 14,
                    'attack_speed'             => 15,
                    'cast_speed'               => 16,
                    'increase_attack_speed'    => 17,
                    'increase_cast_speed'      => 18,
                    'accuracy'                 => 19,
                    'magic_accuracy'           => 20,
                    'increase_accuracy'        => 21,
                    'increase_magic_accuracy'  => 22,
                    'block_ignoring'           => 23,
                    'critical_chance'          => 24,
                    'critical_multiplier'      => 25,
                    'increase_critical_chance' => 26,
                    'damage_multiplier'        => 27,
                    'vampirism'                => 28,
                    'magic_vampirism'          => 29,
                    'critical_stun'            => 30,
                    'critical_bleeding'        => 31,
                ],
            ],
            // exist weapon_type_id and damage_type_id
            [
                [
                    'weapon_type_id'           => WeaponTypeInterface::STAFF,
                    'damage_type_id'           => DamageTypeInterface::SPELL,
                    'physical_damage'          => 1,
                    'fire_damage'              => 2,
                    'water_damage'             => 3,
                    'air_damage'               => 4,
                    'earth_damage'             => 5,
                    'life_damage'              => 6,
                    'death_damage'             => 7,
                    'increase_physical_damage' => 8,
                    'increase_fire_damage'     => 9,
                    'increase_water_damage'    => 10,
                    'increase_air_damage'      => 11,
                    'increase_earth_damage'    => 12,
                    'increase_life_damage'     => 13,
                    'increase_death_damage'    => 14,
                    'attack_speed'             => 15,
                    'cast_speed'               => 16,
                    'increase_attack_speed'    => 17,
                    'increase_cast_speed'      => 18,
                    'accuracy'                 => 19,
                    'magic_accuracy'           => 20,
                    'increase_accuracy'        => 21,
                    'increase_magic_accuracy'  => 22,
                    'block_ignoring'           => 23,
                    'critical_chance'          => 24,
                    'critical_multiplier'      => 25,
                    'increase_critical_chance' => 26,
                    'damage_multiplier'        => 27,
                    'vampirism'                => 28,
                    'magic_vampirism'          => 29,
                    'critical_stun'            => 30,
                    'critical_bleeding'        => 31,
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function newDataProvider(): array
    {
        return [
            [
                null,
                null,
            ],
            [
                new WeaponType(WeaponTypeInterface::AXE),
                new DamageType(DamageTypeInterface::ATTACK),
            ],
        ];
    }
}
