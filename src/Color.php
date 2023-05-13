<?php

namespace BondarDe\Colors;

use BondarDe\Colors\Converters\CmykToRgb;
use BondarDe\Colors\Converters\HexToRgb;
use BondarDe\Colors\Converters\HslToRgb;
use BondarDe\Colors\Converters\HsvToRgb;
use BondarDe\Colors\Converters\RgbToCmyk;
use BondarDe\Colors\Converters\RgbToHex;
use BondarDe\Colors\Converters\RgbToHsl;
use BondarDe\Colors\Converters\RgbToHsv;
use BondarDe\Colors\Utils\ConstructorUtil;
use BondarDe\Colors\Utils\DistanceUtil;
use BondarDe\Colors\Utils\ParseUtil;

class Color
{
    public int $r;
    public int $g;
    public int $b;
    // TODO: alpha?

    public Rgb $rgb;
    public string $hex;
    public string $hex6;
    public Hsl $hsl;
    public Hsv $hsv;
    public Cmyk $cmyk;

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

    public static function parse(string $s): self
    {
        return ParseUtil::parse($s);
    }

    public static function fromHex(string $s): self
    {
        [$r, $g, $b] = HexToRgb::toArray($s);

        return new self($r, $g, $b);
    }

    public static function fromRgb(
        float|array|int $redOrAll,
        float|int|null  $green = null,
        float|int|null  $blue = null,
    ): self
    {
        $arr = is_array($redOrAll)
            ? ConstructorUtil::toConstructorArray($redOrAll, ['r', 'g', 'b'])
            : ['r' => $redOrAll, 'g' => $green, 'b' => $blue];

        $arr = self::scaleFloatToInt($arr, [
            'r' => 255,
            'g' => 255,
            'b' => 255,
        ]);

        return new self($arr['r'], $arr['g'], $arr['b']);
    }

    public static function fromHsv(
        float|array|int $hueOrAll,
        float|int|null  $saturation = null,
        float|int|null  $value = null,
    ): self
    {
        $arr = is_array($hueOrAll)
            ? ConstructorUtil::toConstructorArray($hueOrAll, ['h', 's', 'v'])
            : ['h' => $hueOrAll, 's' => $saturation, 'v' => $value];

        $arr = self::scaleFloatToInt($arr, [
            'h' => 360,
        ]);

        [$r, $g, $b] = self::hsv2rgb($arr['h'], $arr['s'], $arr['v']);

        return new self($r, $g, $b);
    }

    public static function fromHsl(
        float|array|int $hueOrAll,
        float|int|null  $saturation = null,
        float|int|null  $lightness = null,
    ): self
    {
        $arr = is_array($hueOrAll)
            ? ConstructorUtil::toConstructorArray($hueOrAll, ['h', 's', 'l'])
            : ['h' => $hueOrAll, 's' => $saturation, 'l' => $lightness];

        $arr = self::scaleFloatToInt($arr, [
            'h' => 360,
        ]);

        [$r, $g, $b] = self::hsl2rgb($arr['h'], $arr['s'], $arr['l']);

        return new self($r, $g, $b);
    }

    public static function fromCmyk(
        float|array|int $cyanOrAll,
        float|int|null  $magenta = null,
        float|int|null  $yellow = null,
        float|int|null  $key = null,
    ): self
    {
        $arr = is_array($cyanOrAll)
            ? ConstructorUtil::toConstructorArray($cyanOrAll, ['c', 'm', 'y', 'k'])
            : ['c' => $cyanOrAll, 'm' => $magenta, 'y' => $yellow, 'k' => $key];

        $arr = self::scaleFloatToInt($arr);

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

    private static function hsv2rgb(
        int|float $h,
        int|float $s,
        int|float $v,
    ): array
    {
        return HsvToRgb::toArray($h, $s, $v);
    }

    private static function hsl2rgb(
        int|float $h,
        int|float $s,
        int|float $l,
    ): array
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

    public function copy(): self
    {
        return new self($this->r, $this->g, $this->b);
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

    public function __toString(): string
    {
        return $this->hex;
    }

    private static function scaleFloatToInt(array $values, array $maxima = []): array
    {
        $res = [];

        foreach ($values as $key => $val) {
            // scale up to max value if given value is in diapason [0..1)
            if ($val < 1 || $val === 1.0) {
                $maxValue = $maxima[$key] ?? 100;
                $val *= $maxValue;
            }

            $res[$key] = $val;
        }

        return $res;
    }


    public function r(float|int $r): self
    {
        return self::fromRgb(
            $r,
            $this->g,
            $this->b,
        );
    }

    public function g(float|int $g): self
    {
        return self::fromRgb(
            $this->r,
            $g,
            $this->b,
        );
    }

    public function b(float|int $b): self
    {
        return self::fromRgb(
            $this->r,
            $this->g,
            $b,
        );
    }


    public function h(float|int $h): self
    {
        $hsl = $this->hsl;

        return self::fromHsl(
            $h,
            $hsl->s,
            $hsl->l,
        );
    }

    public function s(float|int $s): self
    {
        $hsl = $this->hsl;

        return self::fromHsl(
            $hsl->h,
            $s,
            $hsl->l,
        );
    }

    public function l(float|int $l): self
    {
        $hsl = $this->hsl;

        return self::fromHsl(
            $hsl->h,
            $hsl->s,
            $l,
        );
    }


    public function v(float|int $v): self
    {
        $hsv = $this->hsv;

        return self::fromHsv(
            $hsv->h,
            $hsv->s,
            $v,
        );
    }


    public function c(float|int $c): self
    {
        $cmyk = $this->cmyk;

        return self::fromCmyk(
            $c,
            $cmyk->m,
            $cmyk->y,
            $cmyk->k,
        );
    }

    public function m(float|int $m): self
    {
        $cmyk = $this->cmyk;

        return self::fromCmyk(
            $cmyk->c,
            $m,
            $cmyk->y,
            $cmyk->k,
        );
    }

    public function y(float|int $y): self
    {
        $cmyk = $this->cmyk;

        return self::fromCmyk(
            $cmyk->c,
            $cmyk->m,
            $y,
            $cmyk->k,
        );
    }

    public function k(float|int $k): self
    {
        $cmyk = $this->cmyk;

        return self::fromCmyk(
            $cmyk->c,
            $cmyk->m,
            $cmyk->y,
            $k,
        );
    }
}
