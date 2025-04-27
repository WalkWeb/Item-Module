<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\Stat;

use Item\Drawing\Stat\StatCollectionFactory;
use Item\Drawing\Stat\StatException;
use Item\Drawing\Stat\StatFactory;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class StatCollectionTest extends TestCase
{
    /**
     * @throws ItemException
     */
    public function testStatCollectionAddFirstSuccess(): void
    {
        $collection = StatCollectionFactory::create([
            [
                'name'    => 'offense.criticalChance',
                'value'   => 10,
                'quality' => true,
                'prefix'  => '',
                'suffix'  => '%',
            ],
        ]);

        self::assertCount(1, $collection);

        $stat = StatFactory::create([
            'name'    => 'offense.attackSpeed',
            'value'   => 120,
            'quality' => true,
            'prefix'  => '',
            'suffix'  => '',
        ]);

        $collection->addFirst($stat);

        self::assertCount(2, $collection);
        self::assertEquals($stat, $collection->current());
    }

    /**
     * @throws ItemException
     */
    public function testStatCollectionAddFirstFail(): void
    {
        $collection = StatCollectionFactory::create([
            [
                'name'    => 'offense.criticalChance',
                'value'   => 10,
                'quality' => true,
                'prefix'  => '',
                'suffix'  => '%',
            ],
            [
                'name'    => 'offense.attackSpeed',
                'value'   => 120,
                'quality' => true,
                'prefix'  => '',
                'suffix'  => '',
            ],
        ]);

        $stat = StatFactory::create([
            'name'    => 'offense.criticalChance',
            'value'   => 10,
            'quality' => true,
            'prefix'  => '',
            'suffix'  => '%',
        ]);

        $this->expectException(ItemException::class);
        $this->expectExceptionMessage(StatException::ALREADY_EXIST);
        $collection->addFirst($stat);
    }
}
