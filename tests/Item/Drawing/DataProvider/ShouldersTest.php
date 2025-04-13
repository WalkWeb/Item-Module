<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Shoulders;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class ShouldersTest extends TestCase
{
    /**
     * @throws ItemException
     */
    public function testShouldersGetAll(): void
    {
        self::assertCount(24, Shoulders::getAll());
    }
}
