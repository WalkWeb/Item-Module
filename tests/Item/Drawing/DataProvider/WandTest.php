<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Wand;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class WandTest extends TestCase
{
    /**
     * @throws ItemException
     */
    public function testWandGetAll(): void
    {
        self::assertCount(6, Wand::getAll());
    }
}
