<?php

namespace BondarDe\Colors\Converters;

use BondarDe\Colors\Exceptions\ColorNotParsableException;

class HexToRgb
{
    public static function toArray(string $hex): array
    {
        $hex = self::sanitize($hex);
        self::assertFormat($hex);

        return array_map(function (string $s): int {
            return hexdec($s);
        }, self::toRgbElements($hex));
    }


    private static function sanitize(string $s): string
    {
        return strtolower(ltrim($s, '#'));
    }

    private static function assertFormat(string $hex): void
    {
        if (preg_match('/^([0-9a-f]{3}){1,2}$/', $hex)) {
            return;
        }

        throw new ColorNotParsableException('Not parsable color: "' . $hex . '"');
    }

    private static function toDoubleHex($s): string
    {
        return str_pad($s, 2, $s);
    }

    private static function toRgbElements($hex): array
    {
        $splitSize = strlen($hex) > 4 ? 2 : 1;

        $hexRgbElements = str_split($hex, $splitSize);

        return array_map(function (string $s): string {
            return self::toDoubleHex($s);
        }, $hexRgbElements);
    }
}
