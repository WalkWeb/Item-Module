<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Shield;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class ShieldTest extends TestCase
{
    /**
     * @throws ItemException
     */
    public function testShieldGetAll(): void
    {
        self::assertCount(6, Shield::getAll());
    }
}
