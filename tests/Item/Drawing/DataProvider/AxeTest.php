<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Axe;
use Item\ItemException;
use Tests\Item\ItemTest;

class AxeTest extends ItemTest
{
    /**
     * @throws ItemException
     */
    public function testAxeGetAll(): void
    {
        self::assertCount(24, Axe::getAll());
    }
}
