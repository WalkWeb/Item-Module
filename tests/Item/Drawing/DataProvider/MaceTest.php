<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Mace;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class MaceTest extends TestCase
{
    /**
     * @throws ItemException
     */
    public function testMaceGetAll(): void
    {
        self::assertCount(24, Mace::getAll());
    }
}
