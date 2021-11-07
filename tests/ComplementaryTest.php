<?php
declare(strict_types=1);

namespace Tests;

use BondarDe\Colors\Color;
use PHPUnit\Framework\TestCase;

final class ComplementaryTest extends TestCase
{
    public function testComplementary(): void
    {
        $color1 = Color::fromHex('#0f4c81');
        $color2 = $color1->complementary();

        $this->assertEquals('#80440f', $color2->hex);
    }
}
