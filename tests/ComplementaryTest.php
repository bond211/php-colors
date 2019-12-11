<?php
declare(strict_types=1);

namespace Tests;

use Bond211\Colors\Color;
use PHPUnit\Framework\TestCase;

final class ComplementaryTest extends TestCase
{
    public function testComplementary(): void
    {
        $color1 = Color::fromHex('#0f4c81');
        $color2 = $color1->complementary();

        $this->assertEquals('#824510', $color2->hex);
    }
}
