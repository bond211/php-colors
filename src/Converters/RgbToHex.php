<?php

namespace Bond211\Colors\Converters;

class RgbToHex
{
    public static function toString(int $r, int $g, int $b): string
    {
        return sprintf("%02x%02x%02x", $r, $g, $b);
    }
}
