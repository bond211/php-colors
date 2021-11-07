<?php
declare(strict_types=1);

namespace Tests;

use BondarDe\Colors\Color;
use PHPUnit\Framework\TestCase;

final class StringConversionTest extends TestCase
{
    public function testStringConversions(): void
    {
        $color = Color::fromHex('0f4c81');

        $this->assertEquals('#0f4c81', '' . $color);
    }
}
