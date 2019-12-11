<?php

namespace Bond211\Colors\Converters;

class CmykToRgb
{
    public static function toArray(int $c, int $m, int $y, int $k): array
    {
        return [$r, $g, $b];
    }
}
