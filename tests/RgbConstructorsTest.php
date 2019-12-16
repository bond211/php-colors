<?php
declare(strict_types=1);

namespace Tests;

use Bond211\Colors\Color;
use PHPUnit\Framework\TestCase;

final class RgbConstructorsTest extends TestCase
{
    private function runAssertions(Color $color): void
    {
        $this->assertEquals('#0f4c81', $color->hex);

        $this->assertEquals(15, $color->r);
        $this->assertEquals(76, $color->g);
        $this->assertEquals(129, $color->b);
    }

    public function testFromAllValues(): void
    {
        $color = Color::fromRgb(15, 76, 129);

        $this->runAssertions($color);
    }

    public function testFromAllValuesFloat1(): void
    {
        $color = Color::fromRgb(15 / 255, 76 / 255, 129 / 255);

        $this->runAssertions($color);
    }

    public function testFromAllValuesFloat2(): void
    {
        $color = Color::fromRgb(15, 76 / 255, 129);

        $this->runAssertions($color);
    }

    public function testFromIndexedArray(): void
    {
        $color = Color::fromRgb([15, 76, 129]);

        $this->runAssertions($color);
    }

    public function testFromAssociativeArray(): void
    {
        $color = Color::fromRgb([
            'r' => 15,
            'g' => 76,
            'b' => 129,
        ]);

        $this->runAssertions($color);
    }
}
