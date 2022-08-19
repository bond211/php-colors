<?php

namespace BondarDe\Colors\Converters;

class RgbToHsv
{
    public static function toArray(int $r, int $g, int $b): array
    {
        $min = min($r, $g, $b);
        $max = max($r, $g, $b);
        $delta = $max - $min;

        $h = 0;
        $s = 0;
        $v = $max / 2.55;

        if ($delta > 0) {
            $h = self::toHue($r, $g, $b, $min, $delta);
            $s = 100 * $delta / $max;
        }

        $h = round($h);
        $s = round($s);
        $v = round($v);

        return [$h, $s, $v];
    }

    private static function toHue(int $r, int $g, int $b, int $min, int $d): float|int
    {
        $h = match ($min) {
            $r => 3 - (($g - $b) / $d),
            $b => 1 - (($r - $g) / $d),
            default => 5 - (($b - $r) / $d),
        };

        return 60 * $h;
    }
}
