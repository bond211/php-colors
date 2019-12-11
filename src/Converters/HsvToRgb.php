<?php

namespace Bond211\Colors\Converters;

class HsvToRgb
{
    public static function toArray(int $h, int $s, int $v): array
    {
        return [$r, $g, $b];
    }
}
