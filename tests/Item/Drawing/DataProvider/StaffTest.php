<?php

declare(strict_types=1);

namespace Tests\Item\Drawing\DataProvider;

use Item\Drawing\DataProvider\Staff;
use Item\ItemException;
use PHPUnit\Framework\TestCase;

class StaffTest extends TestCase
{
    /**
     * @throws ItemException
     */
    public function testStaffGetAll(): void
    {
        self::assertCount(6, Staff::getAll());
    }
}
