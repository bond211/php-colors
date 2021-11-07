<?php

namespace BondarDe\Colors\Converters;

class CmykToRgb
{
    public static function toArray(int $c, int $m, int $y, int $k): array
    {
        $r = (100 - $c) * (100 - $k) * .0255;
        $g = (100 - $m) * (100 - $k) * .0255;
        $b = (100 - $y) * (100 - $k) * .0255;

        $r = floor($r);
        $g = floor($g);
        $b = floor($b);

        return [$r, $g, $b];
    }
}
