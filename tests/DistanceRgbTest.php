<?php
declare(strict_types=1);

namespace Tests;

use Bond211\Colors\Color;
use PHPUnit\Framework\TestCase;

final class DistanceRgbTest extends TestCase
{
    public function testDistanceOf0(): void
    {
        $color1 = Color::fromRgb(100, 100, 100);
        $color2 = Color::fromRgb(100, 100, 100);

        $distance = $color1->distanceRgb($color2);

        $this->assertEquals(0, $distance);
    }

    public function testDistanceOf1(): void
    {
        $color1 = Color::fromRgb(100, 100, 100);
        $color2 = Color::fromRgb(101, 100, 100);

        $distance = $color1->distanceRgb($color2);

        $this->assertEquals(1, $distance);
    }

    public function testDistanceOf1_2(): void
    {
        $color1 = Color::fromRgb(100, 100, 100);
        $color2 = Color::fromRgb(101, 101, 100);

        $distance = $color1->distanceRgb($color2);

        $this->assertEquals(1, $distance);
    }

    public function testDistanceOf1_3(): void
    {
        $color1 = Color::fromRgb(100, 100, 100);
        $color2 = Color::fromRgb(101, 101, 101);

        $distance = $color1->distanceRgb($color2);

        $this->assertEquals(2, $distance);
    }
}
