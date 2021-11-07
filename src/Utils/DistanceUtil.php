<?php

namespace BondarDe\Colors\Utils;

use BondarDe\Colors\Color;

class DistanceUtil
{
    public static function distance(Color $color1, Color $color2, array $props): int
    {
        $sum = 0;

        foreach ($props as $prop) {
            $sum += pow($color1->$prop - $color2->$prop, 2);
        }

        return round(sqrt($sum));
    }
}
