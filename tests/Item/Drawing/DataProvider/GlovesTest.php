<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Gloves;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class GlovesTest extends TestCase
{
    /**
     * @throws ItemException
     */
    public function testGlovesGetAll(): void
    {
        self::assertCount(24, Gloves::getAll());
    }
}
