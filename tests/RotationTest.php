<?php
declare(strict_types=1);

namespace Tests;

use BondarDe\Colors\Color;
use PHPUnit\Framework\TestCase;

final class RotationTest extends TestCase
{
    public function test1(): void
    {
        $color = Color::fromHsl(242, 80, 73);

        $rotated10 = $color->rotate(10);
        $rotated20 = $color->rotate(20);

        $this->assertEquals(252, $rotated10->hsl->h);
        $this->assertEquals(262, $rotated20->hsl->h);
    }
}
