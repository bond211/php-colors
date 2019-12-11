<?php

namespace Bond211\Colors\Converters;

class RgbToHsv
{
    public static function toArray(int $r, int $g, int $b): array
    {
        return [$h, $s, $v];
    }
}
