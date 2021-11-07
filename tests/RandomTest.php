<?php
declare(strict_types=1);

namespace Tests;

use BondarDe\Colors\Color;
use PHPUnit\Framework\TestCase;

final class RandomTest extends TestCase
{
    public function test1(): void
    {
        $color = Color::random();

        $r = $color->r;
        $g = $color->g;
        $b = $color->b;

        $this->assertTrue($r >= 0 && $r <= 255, "R ($r) should be in the range [0..255]");
        $this->assertTrue($g >= 0 && $g <= 255, "G ($g) should be in the range [0..255]");
        $this->assertTrue($b >= 0 && $b <= 255, "B ($b) should be in the range [0..255]");
    }
}
