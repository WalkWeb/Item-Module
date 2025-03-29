<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Bow;
use Item\ItemException;
use Tests\Item\ItemTest;

class BowTest extends ItemTest
{
    /**
     * @throws ItemException
     */
    public function testBowGetAll(): void
    {
        self::assertCount(12, Bow::getAll());
    }
}
