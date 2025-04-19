<?php

declare(strict_types=1);

namespace Tests\Item\Defense;

use Item\Defense\DefenseFactory;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class DefenseFactoryTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param array $data
     * @throws ItemException
     */
    public function testDefenseFactoryCreateSuccess(array $data): void
    {
        $defense = DefenseFactory::create($data);

        self::assertEquals($data['physical_resist'], $defense->getPhysicalResist());
        self::assertEquals($data['fire_resist'], $defense->getFireResist());
        self::assertEquals($data['water_resist'], $defense->getWaterResist());
        self::assertEquals($data['air_resist'], $defense->getAirResist());
        self::assertEquals($data['earth_resist'], $defense->getEarthResist());
        self::assertEquals($data['life_resist'], $defense->getLifeResist());
        self::assertEquals($data['death_resist'], $defense->getDeathResist());
        self::assertEquals($data['defense'], $defense->getDefense());
        self::assertEquals($data['magic_defense'], $defense->getMagicDefense());
        self::assertEquals($data['increase_defense'], $defense->getIncreaseDefense());
        self::assertEquals($data['increase_magic_defense'], $defense->getIncreaseMagicDefense());
        self::assertEquals($data['block'], $defense->getBlock());
        self::assertEquals($data['magic_block'], $defense->getMagicBlock());
        self::assertEquals($data['mental_barrier'], $defense->getMentalBarrier());
        self::assertEquals($data['physical_max_resist'], $defense->getPhysicalMaxResist());
        self::assertEquals($data['fire_max_resist'], $defense->getFireMaxResist());
        self::assertEquals($data['water_max_resist'], $defense->getWaterMaxResist());
        self::assertEquals($data['air_max_resist'], $defense->getAirMaxResist());
        self::assertEquals($data['earth_max_resist'], $defense->getEarthMaxResist());
        self::assertEquals($data['life_max_resist'], $defense->getLifeMaxResist());
        self::assertEquals($data['death_max_resist'], $defense->getDeathMaxResist());
        self::assertEquals($data['global_resist'], $defense->getGlobalResist());
        self::assertEquals($data['dodge'], $defense->getDodge());
        self::assertEquals($data['bonus_hidden'], $defense->getBonusHidden());
    }

    public function testDefenseFactoryNew(): void
    {
        $defense = DefenseFactory::new();

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
    }

    // todo fail test

    public function successDataProvider(): array
    {
        return [
            [
                [
                    'physical_resist'        => 1,
                    'fire_resist'            => 2,
                    'water_resist'           => 3,
                    'air_resist'             => 4,
                    'earth_resist'           => 5,
                    'life_resist'            => 6,
                    'death_resist'           => 7,
                    'defense'                => 8,
                    'magic_defense'          => 9,
                    'increase_defense'       => 10,
                    'increase_magic_defense' => 11,
                    'block'                  => 12,
                    'magic_block'            => 13,
                    'mental_barrier'         => 14,
                    'physical_max_resist'    => 15,
                    'fire_max_resist'        => 16,
                    'water_max_resist'       => 17,
                    'air_max_resist'         => 18,
                    'earth_max_resist'       => 19,
                    'life_max_resist'        => 20,
                    'death_max_resist'       => 21,
                    'global_resist'          => 22,
                    'dodge'                  => 23,
                    'bonus_hidden'           => 24,
                ],
            ],
        ];
    }
}
