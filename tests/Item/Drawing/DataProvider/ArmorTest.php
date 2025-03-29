<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Armor;
use Item\ItemException;
use Tests\Item\ItemTest;

class ArmorTest extends ItemTest
{
    /**
     * @throws ItemException
     */
    public function testArmorGetAll(): void
    {
        self::assertCount(24, Armor::getAll());
    }
}
