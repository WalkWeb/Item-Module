<?php

declare(strict_types=1);

namespace Tests\Item\Base;

use Item\Base\BaseFactory;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class BaseFactoryTest extends TestCase
{
    /**
     * @dataProvider successDataProvider
     * @param array $data
     * @throws ItemException
     */
    public function testBaseFactoryCreateSuccess(array $data): void
    {
        $base = BaseFactory::create($data);

        self::assertEquals($data['weight'], $base->getWeight());
        self::assertEquals($data['strength'], $base->getStrength());
        self::assertEquals($data['dexterity'], $base->getDexterity());
        self::assertEquals($data['intelligence'], $base->getIntelligence());
        self::assertEquals($data['will'], $base->getWill());
        self::assertEquals($data['endurance'], $base->getEndurance());
        self::assertEquals($data['percipience'], $base->getPercipience());
        self::assertEquals($data['charisma'], $base->getCharisma());
        self::assertEquals($data['luck'], $base->getLuck());
        self::assertEquals($data['life'], $base->getLife());
        self::assertEquals($data['increase_life'], $base->getIncreaseLife());
        self::assertEquals($data['mana'], $base->getMana());
        self::assertEquals($data['increase_mana'], $base->getIncreaseMana());
        self::assertEquals($data['stamina'], $base->getStamina());
        self::assertEquals($data['max_horror'], $base->getMaxHorror());
        self::assertEquals($data['life_regen'], $base->getLifeRegen());
        self::assertEquals($data['mana_regen'], $base->getManaRegen());
        self::assertEquals($data['bonus_concentration'], $base->getBonusConcentration());
        self::assertEquals($data['bonus_cunning'], $base->getBonusCunning());
        self::assertEquals($data['bonus_rage'], $base->getBonusRage());
        self::assertEquals($data['increase_gold'], $base->getIncreaseGold());
        self::assertEquals($data['stamina_cost'], $base->getStaminaCost());
        self::assertEquals($data['belt_slot'], $base->getBeltSlot());
    }

    public function testBaseFactoryNew(): void
    {
        $weight = 120;
        $base = BaseFactory::new($weight);

        self::assertEquals($weight, $base->getWeight());
        self::assertEquals(0, $base->getStrength());
        self::assertEquals(0, $base->getDexterity());
        self::assertEquals(0, $base->getIntelligence());
        self::assertEquals(0, $base->getWill());
        self::assertEquals(0, $base->getEndurance());
        self::assertEquals(0, $base->getPercipience());
        self::assertEquals(0, $base->getCharisma());
        self::assertEquals(0, $base->getLuck());
        self::assertEquals(0, $base->getLife());
        self::assertEquals(0, $base->getIncreaseLife());
        self::assertEquals(0, $base->getMana());
        self::assertEquals(0, $base->getIncreaseMana());
        self::assertEquals(0, $base->getStamina());
        self::assertEquals(0, $base->getMaxHorror());
        self::assertEquals(0, $base->getLifeRegen());
        self::assertEquals(0, $base->getManaRegen());
        self::assertEquals(0, $base->getBonusConcentration());
        self::assertEquals(0, $base->getBonusCunning());
        self::assertEquals(0, $base->getBonusRage());
        self::assertEquals(0, $base->getIncreaseGold());
        self::assertEquals(0, $base->getStaminaCost());
        self::assertEquals(0, $base->getBeltSlot());
    }

    // todo fail tests

    /**
     * @return array
     */
    public function successDataProvider(): array
    {
        return [
            [
                [
                    'weight'              => 1,
                    'strength'            => 2,
                    'dexterity'           => 3,
                    'intelligence'        => 4,
                    'will'                => 5,
                    'endurance'           => 6,
                    'percipience'         => 7,
                    'charisma'            => 8,
                    'luck'                => 9,
                    'life'                => 10,
                    'increase_life'       => 11,
                    'mana'                => 12,
                    'increase_mana'       => 13,
                    'stamina'             => 14,
                    'max_horror'          => 15,
                    'life_regen'          => 16,
                    'mana_regen'          => 17,
                    'bonus_concentration' => 18,
                    'bonus_cunning'       => 19,
                    'bonus_rage'          => 20,
                    'increase_gold'       => 21,
                    'stamina_cost'        => 22,
                    'belt_slot'           => 23,
                ],
            ],
        ];
    }
}
