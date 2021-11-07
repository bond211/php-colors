<?php
declare(strict_types=1);

namespace Tests;

use BondarDe\Colors\Color;
use BondarDe\Colors\Exceptions\ColorNotParsableException;
use PHPUnit\Framework\TestCase;

final class HexConstructorsTest extends TestCase
{
    public function testColorCreationFromHex(): void
    {
        $color = Color::fromHex('0f4c81');

        $this->assertEquals('#0f4c81', $color->hex);
        $this->assertEquals('0f4c81', $color->hex6);

        $this->assertEquals(15, $color->r);
        $this->assertEquals(76, $color->g);
        $this->assertEquals(129, $color->b);
    }

    public function testColorCreationFromHexWithHash(): void
    {
        $color = Color::fromHex('#0f4c81');

        $this->assertEquals('#0f4c81', $color->hex);
    }

    public function testColorCreationFromHexIgnoreCase(): void
    {
        $color = Color::fromHex('0F4C81');

        $this->assertEquals('#0f4c81', $color->hex);
    }

    public function testColorCreationFromHexWithHashIgnoreCase(): void
    {
        $color = Color::fromHex('#0F4C81');

        $this->assertEquals('#0f4c81', $color->hex);
    }

    public function testColorCreationFromHexFails(): void
    {
        $this->expectException(ColorNotParsableException::class);

        Color::fromHex('xyz123');
    }
}
