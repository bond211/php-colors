<?php
declare(strict_types=1);

namespace Tests;

use Bond211\Colors\Color;
use PHPUnit\Framework\TestCase;

final class HsvConstructorsTest extends TestCase
{
    private function runAssertions(Color $color): void
    {
        // [!] ALL channels slightly shifted

        $this->assertEquals('#104d82', $color->hex);

        $this->assertEquals(16, $color->r);
        $this->assertEquals(77, $color->g);
        $this->assertEquals(130, $color->b);
    }

    public function testFromAllValues(): void
    {
        $color = Color::fromHsv(208, 88, 51);

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
