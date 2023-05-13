<?php
declare(strict_types=1);

namespace Tests;

use BondarDe\Colors\Color;
use PHPUnit\Framework\TestCase;

final class SingleChannelManipulationTest extends TestCase
{
    public function test1(): void
    {
        $color = Color::fromHsl(242, 80, 73);

        $lightness10 = $color->l(10);
        $lightness90 = $color->l(90);

        $this->assertEqualsWithDelta(242, $lightness10->hsl->h, 1);
        $this->assertEquals(80, $lightness10->hsl->s);
        $this->assertEquals(10, $lightness10->hsl->l);

        $this->assertEqualsWithDelta(242, $lightness90->hsl->h, 1);
        $this->assertEquals(80, $lightness90->hsl->s);
        $this->assertEquals(90, $lightness90->hsl->l);
    }
}
