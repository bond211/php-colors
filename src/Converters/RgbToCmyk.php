<?php

namespace BondarDe\Colors\Converters;

class RgbToCmyk
{
    public static function toArray(int $r, int $g, int $b): array
    {
        $c = 255 - $r;
        $m = 255 - $g;
        $y = 255 - $b;
        $k = min($c, $m, $y);

        if ($k < 255) {
            $c = self::mapValue($c, $k);
            $m = self::mapValue($m, $k);
            $y = self::mapValue($y, $k);
        }

        $c = round($c / 2.55);
        $m = round($m / 2.55);
        $y = round($y / 2.55);
        $k = round($k / 2.55);

        return [$c, $m, $y, $k];
    }

    private static function mapValue(int $val, int $k): float
    {
        return 255 * ($val - $k) / (255 - $k);
    }
}
