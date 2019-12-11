<?php
declare(strict_types=1);

namespace Tests;

use Bond211\Colors\Color;
use PHPUnit\Framework\TestCase;

final class ToStringTest extends TestCase
{
    public function testRgb(): void
    {
        $color = Color::fromHex('#0f4c81');

        $this->assertEquals('15, 76, 129', $color->rgb);
    }

    public function testHsl(): void
    {
        $color = Color::fromHex('#0f4c81');

        $this->assertEquals('208°, 79%, 28%', '' . $color->hsl);
    }

    public function testHsv(): void
    {
        $color = Color::fromHex('#0f4c81');

        $this->assertEquals('208°, 88%, 51%', '' . $color->hsv);
    }

    public function testCmyk(): void
    {
        $color = Color::fromHex('#0f4c81');

        $this->assertEquals('88%, 41%, 0%, 49%', '' . $color->cmyk);
    }
}
