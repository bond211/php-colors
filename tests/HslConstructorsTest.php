<?php
declare(strict_types=1);

namespace Tests;

use Bond211\Colors\Color;
use PHPUnit\Framework\TestCase;

final class HslConstructorsTest extends TestCase
{
    private function runAssertions(Color $color): void
    {
        // [!] green channel slightly shifted
        // [!] blue channel slightly shifted

        $this->assertEquals('#0f4b80', $color->hex);

        $this->assertEquals(15, $color->r);
        $this->assertEquals(75, $color->g);
        $this->assertEquals(128, $color->b);
    }

    public function testFromAllValues(): void
    {
        $color = Color::fromHsl(208, 79, 28);

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
