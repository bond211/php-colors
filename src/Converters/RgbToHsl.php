<?php

namespace Bond211\Colors\Converters;

class RgbToHsl
{
    public static function toArray(int $r, int $g, int $b)
    {
        $min = min($r, $g, $b);
        $max = max($r, $g, $b);
        $delta = $max - $min;

        $h = 0;
        $s = 0;
        $l = ($min + $max) / 2;

        if ($delta > 0) {
            $h = self::toHue($r, $g, $b, $delta, $max);
            $s = self::toSaturation($l, $delta);
        }

        $h = round($h);
        $s = round($s);
        $l = round($l / 2.55);

        return [$h, $s, $l];
    }

    private static function toHue(int $r, int $g, int $b, int $d, int $max)
    {
        switch ($max) {
            case $r:
                $h = 60 * ((($g - $b) / $d) % 6);
                if ($b > $g) {
                    $h += 360;
                }
                break;
            case $g:
                $h = 60 * (($b - $r) / $d + 2);
                break;
            case $b:
            default:
                $h = 60 * (($r - $g) / $d + 4);
                break;
        }

        return $h;
    }

    private static function toSaturation(int $l, int $delta)
    {
        $denominator = 1 - abs($l / 127.5 - 1);
        $denominator *= 2.55;

        return $delta / $denominator;
    }
}
