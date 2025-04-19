<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Sword;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class SwordTest extends TestCase
{
    /**
     * @throws ItemException
     */
    public function testSwordGetAll(): void
    {
        self::assertCount(24, Sword::getAll());
    }
}
