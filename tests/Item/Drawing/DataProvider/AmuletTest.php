<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Amulet;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class AmuletTest extends TestCase
{
    /**
     * @throws ItemException
     */
    public function testAmuletGetAll(): void
    {
        self::assertCount(6, Amulet::getAll());
    }
}
