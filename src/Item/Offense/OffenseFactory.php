<?php

declare(strict_types=1);

namespace Item\Offense;

use Item\ItemException;
use Item\Traits\ValidationTrait;
use Item\Type\Damage\DamageType;
use Item\Type\Damage\DamageTypeInterface;
use Item\Type\Weapon\WeaponType;
use Item\Type\Weapon\WeaponTypeInterface;

class OffenseFactory
{
    use ValidationTrait;

    /**
     * @param array $data
     * @return OffenseInterface
     * @throws ItemException
     */
    public static function create(array $data): OffenseInterface
    {
        $weaponTypeId = self::intOrNull($data, 'weapon_type_id', OffenseException::INVALID_WEAPON_TYPE_ID);
        $weaponType = $weaponTypeId ? new WeaponType($weaponTypeId) : null;

        $damageTypeId = self::intOrNull($data, 'damage_type_id', OffenseException::INVALID_DAMAGE_TYPE_ID);
        $damageType = $damageTypeId ? new DamageType($damageTypeId) : null;

        return new Offense(
            $weaponType,
            $damageType,
            self::int($data, 'physical_damage', OffenseException::INVALID_PHYSICAL_DAMAGE),
            self::int($data, 'fire_damage', OffenseException::INVALID_FIRE_DAMAGE),
            self::int($data, 'water_damage', OffenseException::INVALID_WATER_DAMAGE),
            self::int($data, 'air_damage', OffenseException::INVALID_AIR_DAMAGE),
            self::int($data, 'earth_damage', OffenseException::INVALID_EARTH_DAMAGE),
            self::int($data, 'life_damage', OffenseException::INVALID_LIFE_DAMAGE),
            self::int($data, 'death_damage', OffenseException::INVALID_DEATH_DAMAGE),
            self::int($data, 'increase_physical_damage', OffenseException::INVALID_INCREASE_PHYSICAL_DAMAGE),
            self::int($data, 'increase_fire_damage', OffenseException::INVALID_INCREASE_FIRE_DAMAGE),
            self::int($data, 'increase_water_damage', OffenseException::INVALID_INCREASE_WATER_DAMAGE),
            self::int($data, 'increase_air_damage', OffenseException::INVALID_INCREASE_AIR_DAMAGE),
            self::int($data, 'increase_earth_damage', OffenseException::INVALID_INCREASE_EARTH_DAMAGE),
            self::int($data, 'increase_life_damage', OffenseException::INVALID_INCREASE_LIFE_DAMAGE),
            self::int($data, 'increase_death_damage', OffenseException::INVALID_INCREASE_DEATH_DAMAGE),
            self::int($data, 'attack_speed', OffenseException::INVALID_ATTACK_SPEED),
            self::int($data, 'cast_speed', OffenseException::INVALID_CAST_SPEED),
            self::int($data, 'increase_attack_speed', OffenseException::INVALID_INCREASE_ATTACK_SPEED),
            self::int($data, 'increase_cast_speed', OffenseException::INVALID_INCREASE_CAST_SPEED),
            self::int($data, 'accuracy', OffenseException::INVALID_ACCURACY),
            self::int($data, 'magic_accuracy', OffenseException::INVALID_MAGIC_ACCURACY),
            self::int($data, 'increase_accuracy', OffenseException::INVALID_INCREASE_ACCURACY),
            self::int($data, 'increase_magic_accuracy', OffenseException::INVALID_INCREASE_MAGIC_ACCURACY),
            self::int($data, 'block_ignoring', OffenseException::INVALID_BLOCK_IGNORING),
            self::int($data, 'critical_chance', OffenseException::INVALID_CRITICAL_CHANCE),
            self::int($data, 'critical_multiplier', OffenseException::INVALID_CRITICAL_MULTIPLIER),
            self::int($data, 'increase_critical_chance', OffenseException::INVALID_INCREASE_CRITICAL_CHANCE),
            self::int($data, 'damage_multiplier', OffenseException::INVALID_DAMAGE_MULTIPLIER),
            self::int($data, 'vampirism', OffenseException::INVALID_VAMPIRISM),
            self::int($data, 'magic_vampirism', OffenseException::INVALID_MAGIC_VAMPIRISM),
            self::int($data, 'critical_stun', OffenseException::INVALID_CRITICAL_STUN),
            self::int($data, 'critical_bleeding', OffenseException::INVALID_CRITICAL_BLEEDING),
        );
    }

    /**
     * @param WeaponTypeInterface|null $weaponType
     * @param DamageTypeInterface|null $damageType
     * @return OffenseInterface
     */
    public static function new(?WeaponTypeInterface $weaponType = null, ?DamageTypeInterface $damageType = null): OffenseInterface
    {
        return new Offense($weaponType, $damageType);
    }
}
