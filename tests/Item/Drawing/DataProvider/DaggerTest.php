<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Dagger;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class DaggerTest extends TestCase
{
    /**
     * @throws ItemException
     */
    public function testDaggerGetAll(): void
    {
        self::assertCount(6, Dagger::getAll());
    }
}
