# PHP Colors

## Creating color

**Hex**

Lowercase, uppercase, with/without hash:

    Color::fromHex('#0f4c81');
    Color::fromHex('#0F4C81');
    Color::fromHex('0f4c81');
    Color::fromHex('0F4C81');


**RGB**

Integers, indexed array, associative array:

    Color::fromRgb(15, 76, 129);
    Color::fromRgb([15, 76, 129]); 
    Color::fromRgb([
        'r' => 15,
        'g' => 76,
        'b' => 129,
    ]);


**HSL**

Integers, indexed array, associative array:

    Color::fromRgb(208, 79, 28);
    Color::fromRgb([208, 79, 28]); 
    Color::fromRgb([
        'h' => 208,
        's' => 79,
        'l' => 28,
    ]);


**HSV**

Integers, indexed array, associative array:

    Color::fromRgb(208, 88, 51);
    Color::fromRgb([208, 88, 51]); 
    Color::fromRgb([
        'h' => 208,
        's' => 88,
        'v' => 51,
    ]);


**CMYK**

Integers, indexed array, associative array:

    Color::fromCmyk(88, 41, 0, 49);
    Color::fromCmyk([88, 41, 0, 49]); 
    Color::fromCmyk([
        'c' => 88,
        'm' => 41,
        'y' => 0,
        'k' => 49,
    ]);


### Random

Generate random color:

    Color::random();


## Just `echo` it

You can use a `Color` object as string:

    echo Color::fromHex('#0f4c81');


## Color manipulations

    $color->rotate(120);
    $color->complementary();


## Useful Information

E.g. to decide which font color to use with given background color you can detect whether the color is bright or dark:

    $color->isBright();
    $color->isDark();


Distance of RGB values for two given colors:

    $color->distanceRgb($anotherColor);

