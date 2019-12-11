<?php
declare(strict_types=1);

namespace Tests;

use Bond211\Colors\Color;
use Bond211\Colors\Utils\DistanceUtil;
use PHPUnit\Framework\TestCase;

final class DistanceUtilTest extends TestCase
{
    public function testDistanceOf0(): void
    {
        $color1 = Color::fromRgb(100, 100, 100);
        $color2 = Color::fromRgb(100, 100, 100);

        $distance = DistanceUtil::distance($color1, $color2, ['r', 'g', 'b']);

        $this->assertEquals(0, $distance);
    }
}
