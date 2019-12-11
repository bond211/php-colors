<?php
declare(strict_types=1);

namespace Tests;

use Bond211\Colors\Color;
use PHPUnit\Framework\TestCase;

final class CmykConstructorsTest extends TestCase
{
    private function runAssertions(Color $color): void
    {
        // [!] blue channel slightly shifted

        $this->assertEquals('#0f4c82', $color->hex);

        $this->assertEquals(15, $color->r);
        $this->assertEquals(76, $color->g);
        $this->assertEquals(130, $color->b);
    }

    public function testFromAllValues(): void
    {
        $color = Color::fromCmyk(88, 41, 0, 49);

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
