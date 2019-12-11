<?php

namespace Bond211\Colors\Converters;

class RgbToCmyk
{
    public static function toArray(int $r, int $g, int $b): array
    {
        return [$c, $m, $y, $k];
    }
}
