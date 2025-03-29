<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Boots;
use Item\ItemException;
use Tests\Item\ItemTest;

class BootsTest extends ItemTest
{
    /**
     * @throws ItemException
     */
    public function testBootsGetAll(): void
    {
        self::assertCount(24, Boots::getAll());
    }
}
