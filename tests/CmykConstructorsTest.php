<?php
declare(strict_types=1);

namespace Tests;

use BondarDe\Colors\Color;
use PHPUnit\Framework\TestCase;

final class CmykConstructorsTest extends TestCase
{
    private function runAssertions(Color $color): void
    {
        $refColor = Color::fromHex('0f4c81');

        $distanceRgb = $refColor->distanceRgb($color);
        $this->assertTrue($distanceRgb <= 1, "Max. allowed RGB distance of 1 exceeded: $distanceRgb");
    }

    public function testFromAllValues(): void
    {
        $color = Color::fromCmyk(88, 41, 0, 49);

        $this->runAssertions($color);
    }

    public function testFromAllValuesFloat1(): void
    {
        $color = Color::fromCmyk(88 / 100, 41 / 100, 0 / 100, 49 / 100);

        $this->runAssertions($color);
    }

    public function testFromAllValuesFloat2(): void
    {
        $color = Color::fromCmyk(88 / 100, 41, 0, 49 / 100);

        $this->runAssertions($color);
    }

    public function testFromIndexedArray(): void
    {
        $color = Color::fromCmyk([88, 41, 0, 49]);

        $this->runAssertions($color);
    }

    public function testFromAssociativeArray(): void
    {
        $color = Color::fromCmyk([
            'c' => 88,
            'm' => 41,
            'y' => 0,
            'k' => 49,
        ]);

        $this->runAssertions($color);
    }
}
