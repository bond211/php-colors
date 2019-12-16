<?php
declare(strict_types=1);

namespace Tests;

use Bond211\Colors\Color;
use PHPUnit\Framework\TestCase;

final class HslConstructorsTest extends TestCase
{
    private function runAssertions(Color $color): void
    {
        $refColor = Color::fromHex('0f4c81');

        $distanceRgb = $refColor->distanceRgb($color);
        $this->assertTrue($distanceRgb <= 2, "Max. allowed RGB distance of 2 exceeded: $distanceRgb");
    }

    public function testFromAllValues(): void
    {
        $color = Color::fromHsl(208, 79, 28);

        $this->runAssertions($color);
    }

    public function testFromAllValuesFloat1(): void
    {
        $color = Color::fromHsl(208 / 360, 79 / 100, 28 / 100);

        $this->runAssertions($color);
    }

    public function testFromAllValuesFloat2(): void
    {
        $color = Color::fromHsl(208, 79 / 100, 28 / 100);

        $this->runAssertions($color);
    }

    public function testFromAllValues2(): void
    {
        $color = Color::fromHsl(252, 80, 73);

        $this->assertEquals(252, $color->hsl->h);
    }

    public function testFromIndexedArray(): void
    {
        $color = Color::fromHsl([208, 79, 28]);

        $this->runAssertions($color);
    }

    public function testFromAssociativeArray(): void
    {
        $color = Color::fromHsl([
            'h' => 208,
            's' => 79,
            'l' => 28,
        ]);

        $this->runAssertions($color);
    }
}
