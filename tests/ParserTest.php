<?php

namespace Tests;

use BondarDe\Colors\Color;
use BondarDe\Colors\Exceptions\ColorNotParsableException;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    public function testParserHexSuccess()
    {
        $color = Color::parse('0f4c81');

        $this->assertEquals('#0f4c81', $color->hex);
        $this->assertEquals('0f4c81', $color->hex6);

        $this->assertEquals(15, $color->r);
        $this->assertEquals(76, $color->g);
        $this->assertEquals(129, $color->b);
    }

    public function testParserHexFailure()
    {
        $this->expectException(ColorNotParsableException::class);

        Color::parse('xyz123');
    }

    public function testParserRgbSuccess()
    {
        $color = Color::parse('rgb(1,2,3)');

        $this->assertEquals(1, $color->r);
        $this->assertEquals(2, $color->g);
        $this->assertEquals(3, $color->b);

        $color = Color::parse('rgb(1, 2, 3)');

        $this->assertEquals(1, $color->r);
        $this->assertEquals(2, $color->g);
        $this->assertEquals(3, $color->b);

        $color = Color::parse('rgb(1 2 3)');

        $this->assertEquals(1, $color->r);
        $this->assertEquals(2, $color->g);
        $this->assertEquals(3, $color->b);
    }

    public function testParserRgbaSuccess()
    {
        $color = Color::parse('rgba(1,2,3,0.4)');

        $this->assertEquals(1, $color->r);
        $this->assertEquals(2, $color->g);
        $this->assertEquals(3, $color->b);

        $color = Color::parse('rgba(1, 2, 3, 0.4)');

        $this->assertEquals(1, $color->r);
        $this->assertEquals(2, $color->g);
        $this->assertEquals(3, $color->b);

        $color = Color::parse('rgba(1,2,3,.5)');

        $this->assertEquals(1, $color->r);
        $this->assertEquals(2, $color->g);
        $this->assertEquals(3, $color->b);

        $color = Color::parse('rgba(1, 2, 3, 0.5)');

        $this->assertEquals(1, $color->r);
        $this->assertEquals(2, $color->g);
        $this->assertEquals(3, $color->b);

        $color = Color::parse('rgba(1 2 3 0.5)');

        $this->assertEquals(1, $color->r);
        $this->assertEquals(2, $color->g);
        $this->assertEquals(3, $color->b);
    }
}
