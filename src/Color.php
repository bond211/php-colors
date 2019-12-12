<?php

namespace Bond211\Colors;

use Bond211\Colors\Converters\CmykToRgb;
use Bond211\Colors\Converters\HexToRgb;
use Bond211\Colors\Converters\HslToRgb;
use Bond211\Colors\Converters\HsvToRgb;
use Bond211\Colors\Converters\RgbToCmyk;
use Bond211\Colors\Converters\RgbToHex;
use Bond211\Colors\Converters\RgbToHsl;
use Bond211\Colors\Converters\RgbToHsv;
use Bond211\Colors\Utils\ConstructorUtil;
use Bond211\Colors\Utils\DistanceUtil;

class Color
{
    public $r;
    public $g;
    public $b;

    public $rgb;
    public $hex;
    public $hex6;
    public $hsl;
    public $hsv;
    public $cmyk;

    public function __construct(int $r, int $g, int $b)
    {
        $this->r = $r;
        $this->g = $g;
        $this->b = $b;

        $this->hex6 = RgbToHex::toString($r, $g, $b);
        $this->hex = '#' . $this->hex6;

        $this->rgb = new Rgb([$r, $g, $b]);
        $this->hsl = new Hsl(self::rgb2hsl($r, $g, $b));
        $this->hsv = new Hsv(self::rgb2hsv($r, $g, $b));
        $this->cmyk = new Cmyk(self::rgb2cmyk($r, $g, $b));
    }

    public static function fromHex(string $s): self
    {
        [$r, $g, $b] = HexToRgb::toArray($s);
        return new self($r, $g, $b);
    }

    public static function fromRgb($redOrAll, int $green = null, int $blue = null): self
    {
        $arr = is_array($redOrAll)
            ? ConstructorUtil::toConstructorArray($redOrAll, ['r', 'g', 'b'])
            : ['r' => $redOrAll, 'g' => $green, 'b' => $blue];

        return new self($arr['r'], $arr['g'], $arr['b']);
    }

    public static function fromHsv($hueOrAll, int $saturation = null, int $value = null): self
    {
        $arr = is_array($hueOrAll)
            ? ConstructorUtil::toConstructorArray($hueOrAll, ['h', 's', 'v'])
            : ['h' => $hueOrAll, 's' => $saturation, 'v' => $value];

        [$r, $g, $b] = self::hsv2rgb($arr['h'], $arr['s'], $arr['v']);

        return new self($r, $g, $b);
    }

    public static function fromHsl($hueOrAll, int $saturation = null, int $lightness = null): self
    {
        $arr = is_array($hueOrAll)
            ? ConstructorUtil::toConstructorArray($hueOrAll, ['h', 's', 'l'])
            : ['h' => $hueOrAll, 's' => $saturation, 'l' => $lightness];

        [$r, $g, $b] = self::hsl2rgb($arr['h'], $arr['s'], $arr['l']);

        return new self($r, $g, $b);
    }

    public static function fromCmyk($cyanOrAll, int $magenta = null, int $yellow = null, int $key = null): self
    {
        $arr = is_array($cyanOrAll)
            ? ConstructorUtil::toConstructorArray($cyanOrAll, ['c', 'm', 'y', 'k'])
            : ['c' => $cyanOrAll, 'm' => $magenta, 'y' => $yellow, 'k' => $key];

        [$r, $g, $b] = self::cmyk2rgb($arr['c'], $arr['m'], $arr['y'], $arr['k']);

        return new self($r, $g, $b);
    }


    public static function random(): self
    {
        return self::fromRgb(
            mt_rand(0, 255),
            mt_rand(0, 255),
            mt_rand(0, 255)
        );
    }

    private static function rgb2hsl(int $r, int $g, int $b): array
    {
        return RgbToHsl::toArray($r, $g, $b);
    }

    private static function rgb2hsv(int $r, int $g, int $b): array
    {
        return RgbToHsv::toArray($r, $g, $b);
    }

    private static function rgb2cmyk(int $r, int $g, int $b): array
    {
        return RgbToCmyk::toArray($r, $g, $b);
    }

    private static function cmyk2rgb(int $c, int $m, int $y, int $k): array
    {
        return CmykToRgb::toArray($c, $m, $y, $k);
    }

    private static function hsv2rgb(int $h, int $s, int $v): array
    {
        return HsvToRgb::toArray($h, $s, $v);
    }

    private static function hsl2rgb(int $h, int $s, int $l): array
    {
        return HslToRgb::toArray($h, $s, $l);
    }

    public function isBright(int $threshold = 130): bool
    {
        return ($this->r * 299 + $this->g * 587 + $this->b * 114) / 1000 > $threshold;
    }

    public function isDark(int $threshold = 130): bool
    {
        return !$this->isBright($threshold);
    }

    public function rotate(int $deg): self
    {
        $hsl = $this->hsl;
        $h = ($hsl->h + $deg) % 360;

        return Color::fromHsl($h, $hsl->s, $hsl->l);
    }

    public function complementary(): self
    {
        return $this->rotate(180);
    }

    public function distanceRgb(Color $another): int
    {
        return DistanceUtil::distance($this, $another, ['r', 'g', 'b']);
    }

    public function __toString()
    {
        return $this->hex;
    }
}
