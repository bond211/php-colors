<?php

namespace Bond211\Colors\Converters;

class HslToRgb
{
    public static function toArray(int $h, int $s, int $l): array
    {
        return [$r, $g, $b];
    }
}
