<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Legs;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class LegsTest extends TestCase
{
    /**
     * @throws ItemException
     */
    public function testLegsGetAll(): void
    {
        self::assertCount(24, Legs::getAll());
    }
}
