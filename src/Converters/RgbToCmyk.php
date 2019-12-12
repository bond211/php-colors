<?php

namespace Bond211\Colors\Converters;

class RgbToCmyk
{
    public static function toArray(int $r, int $g, int $b): array
    {
        $c = 255 - $r;
        $m = 255 - $g;
        $y = 255 - $b;
        $k = min($c, $m, $y);

        if ($k < 255) {
            $c = 255 * ($c - $k) / (255 - $k);
            $m = 255 * ($m - $k) / (255 - $k);
            $y = 255 * ($y - $k) / (255 - $k);
        }

        $c = round($c / 2.55);
        $m = round($m / 2.55);
        $y = round($y / 2.55);
        $k = round($k / 2.55);

        return [$c, $m, $y, $k];
    }
}
