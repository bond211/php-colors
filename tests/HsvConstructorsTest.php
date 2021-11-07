<?php
declare(strict_types=1);

namespace Tests;

use BondarDe\Colors\Color;
use PHPUnit\Framework\TestCase;

final class HsvConstructorsTest extends TestCase
{
    private function runAssertions(Color $color): void
    {
        $refColor = Color::fromHex('0f4c81');

        $distanceRgb = $refColor->distanceRgb($color);
        $this->assertTrue($distanceRgb <= 3, "Max. allowed RGB distance of 3 exceeded: $distanceRgb");
    }

    public function testFromAllValues(): void
    {
        $color = Color::fromHsv(208, 88, 51);

        $this->runAssertions($color);
    }

    public function testFromAllValuesFloat1(): void
    {
        $color = Color::fromHsv(208 / 360, 88 / 100, 51 / 100);

        $this->runAssertions($color);
    }

    public function testFromAllValuesFloat2(): void
    {
        $color = Color::fromHsv(208, 88 / 100, 51);

        $this->runAssertions($color);
    }

    public function testFromIndexedArray(): void
    {
        $color = Color::fromHsv([208, 88, 51]);

        $this->runAssertions($color);
    }

    public function testFromAssociativeArray(): void
    {
        $color = Color::fromHsv([
            'h' => 208,
            's' => 88,
            'v' => 51,
        ]);

        $this->runAssertions($color);
    }
}
