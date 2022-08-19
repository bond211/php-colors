<?php

namespace BondarDe\Colors\Utils;

use BondarDe\Colors\Color;
use BondarDe\Colors\Exceptions\ColorNotParsableException;

class ParseUtil
{
    private const PATTERN_0_TO_255 = '25[0-5]|2[0-4]\d|1\d{1,2}|\d\d?';
    private const PATTERN_ALPHA_0_TO_1 = '0|1|0?\.\d+';
    private const PATTERN_SEPARATOR = '\s*,\s*';

    private const R = '(?<r>' . self::PATTERN_0_TO_255 . ')';
    private const G = '(?<g>' . self::PATTERN_0_TO_255 . ')';
    private const B = '(?<b>' . self::PATTERN_0_TO_255 . ')';
    private const ALPHA = '(?<alpha>' . self::PATTERN_ALPHA_0_TO_1 . ')';

    private const PATTERN_RGB = '/^rgb\(\s*' . self::R . self::PATTERN_SEPARATOR . self::G . self::PATTERN_SEPARATOR . self::B . '\s*\)$/';
    private const PATTERN_RGBA = '/^rgba\(\s*' . self::R . self::PATTERN_SEPARATOR . self::G . self::PATTERN_SEPARATOR . self::B . self::PATTERN_SEPARATOR . self::ALPHA . '\s*\)$/';

    public static function parse(string $s): Color
    {
        $s = trim($s);
        $color = self::fromHex($s) ?? self::fromRgb($s) ?? self::fromRgba($s);

        if ($color) {
            return $color;
        }

        throw new ColorNotParsableException('Color not parsable: "' . $s . '"');
    }

    private static function fromHex(string $s): ?Color
    {
        try {
            return Color::fromHex($s);
        } catch (ColorNotParsableException) {
            return null;
        }
    }

    private static function fromRgb(string $s): ?Color
    {
        if (preg_match(self::PATTERN_RGB, $s, $matches)) {
            return Color::fromRgb($matches['r'], $matches['g'], $matches['b']);
        }

        return null;
    }

    private static function fromRgba(string $s): ?Color
    {
        if (preg_match(self::PATTERN_RGBA, $s, $matches)) {
            return Color::fromRgb($matches['r'], $matches['g'], $matches['b']);
        }

        return null;
    }
}
