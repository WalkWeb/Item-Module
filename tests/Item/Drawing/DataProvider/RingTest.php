<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Ring;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class RingTest extends TestCase
{
    /**
     * @throws ItemException
     */
    public function testRingGetAll(): void
    {
        self::assertCount(6, Ring::getAll());
    }
}
