<?php

namespace BondarDe\Colors\Converters;

class HsvToRgb
{
    public static function toArray(
        int|float $h,
        int|float $s,
        int|float $v,
    ): array
    {
        $rgb = self::toBaseRgb($h);

        return self::toActualRgb($s, $v, $rgb);
    }

    private static function toBaseRgb(int|float $h): array
    {
        $rgb = [0, 0, 0];

        for ($i = 0; $i < 3; $i++) {
            $deg = abs($h - $i * 120);

            if ($deg >= 120) {
                continue;
            }

            $distance = max(60, $deg);
            $rgb[$i % 3] = 1 - (($distance - 60) / 60);
        }

        return $rgb;
    }

    private static function toActualRgb(
        int|float $s,
        int|float $v,
        array     $rgb,
    ): array
    {
        $max = max($rgb);
        $factor = 255 * ($v / 100);

        for ($i = 0; $i < 3; $i++) {
            $d = $max - $rgb[$i];
            $f = $rgb[$i] + $d * (1 - $s / 100);
            $rgb[$i] = round($factor * $f);
        }

        return $rgb;
    }
}
