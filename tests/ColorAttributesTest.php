<?php
declare(strict_types=1);

namespace Tests;

use BondarDe\Colors\Color;
use PHPUnit\Framework\TestCase;

final class ColorAttributesTest extends TestCase
{
    public function testHex(): void
    {
        $color = Color::fromHex('0f4c81');

        $this->assertEquals('#0f4c81', $color->hex);
        $this->assertEquals('0f4c81', $color->hex6);
    }

    public function testRgb(): void
    {
        $color = Color::fromHex('0f4c81');

        $this->assertEquals(15, $color->r);
        $this->assertEquals(76, $color->g);
        $this->assertEquals(129, $color->b);

        $this->assertEquals(15, $color->rgb->r);
        $this->assertEquals(76, $color->rgb->g);
        $this->assertEquals(129, $color->rgb->b);
    }

    public function testHsl(): void
    {
        $color = Color::fromHex('0f4c81');

        $this->assertEquals(208, $color->hsl->h, 'H value mismatch');
        $this->assertEquals(79, $color->hsl->s, 'S value mismatch');
        $this->assertEquals(28, $color->hsl->l, 'L value mismatch');
    }

    public function testHsv(): void
    {
        $color = Color::fromHex('0f4c81');

        $this->assertEquals(208, $color->hsv->h, 'H value mismatch');
        $this->assertEquals(88, $color->hsv->s, 'S value mismatch');
        $this->assertEquals(51, $color->hsv->v, 'V value mismatch');
    }

    public function testCmyk(): void
    {
        $color = Color::fromHex('0f4c81');

        $this->assertEquals(88, $color->cmyk->c, 'C value mismatch');
        $this->assertEquals(41, $color->cmyk->m, 'M value mismatch');
        $this->assertEquals(0, $color->cmyk->y, 'Y value mismatch');
        $this->assertEquals(49, $color->cmyk->k, 'K value mismatch');
    }
}
