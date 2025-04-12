<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Helmet;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class HelmetTest extends TestCase
{
    /**
     * @throws ItemException
     */
    public function testHelmetGetAll(): void
    {
        self::assertCount(24, Helmet::getAll());
    }
}
