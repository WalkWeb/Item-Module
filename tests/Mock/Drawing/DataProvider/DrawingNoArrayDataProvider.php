<?php

declare(strict_types=1);

namespace Tests\Mock\Drawing\DataProvider;

use Item\Drawing\DataProvider\AbstractDrawingDataProvider;

class DrawingNoArrayDataProvider extends AbstractDrawingDataProvider
{
    protected static array $drawings = [
        'data',
    ];
}
