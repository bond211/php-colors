# PHP Colors

## Creating color

**Hex**

Lowercase, uppercase, with/without hash:

    Color::fromHex('#0f4c81');
    Color::fromHex('#0F4C81');
    Color::fromHex('0f4c81');
    Color::fromHex('0F4C81');


**RGB**

Integers, floats, indexed or associative array of integers/floats:

    Color::fromRgb(15, 76, 129);
    Color::fromRgb([15, 76, 129]); 
    Color::fromRgb([
        'r' => 15,
        'g' => 76,
        'b' => 129,
    ]);

    Color::fromRgb(0.06, 0.3, 0.51);
    Color::fromRgb([0.06, 0.3, 0.51]);
    Color::fromRgb([
        'r' => 0.06,
        'g' => 0.3,
        'b' => 0.51,
    ]);


**HSL**

Integers, floats, indexed or associative array of integers/floats:

    Color::fromHsl(208, 79, 28);
    Color::fromHsl([208, 79, 28]); 
    Color::fromHsl([
        'h' => 208,
        's' => 79,
        'l' => 28,
    ]);

    Color::fromHsl(0.58, 0.79, 0.28);
    Color::fromHsl([0.58, 0.79, 0.28]); 
    Color::fromHsl([
        'h' => 208,
        's' => 79,
        'l' => 28,
    ]);

    Color::fromHsl([208, 0.79, 0.28]); 


**HSV**

Integers, floats, indexed or associative array of integers/floats:

    Color::fromHsv(208, 88, 51);
    Color::fromHsv([208, 88, 51]); 
    Color::fromHsv([
        'h' => 208,
        's' => 88,
        'v' => 51,
    ]);

    Color::fromHsv(0.58, 0.88, 0.51);
    Color::fromHsv([0.58, 0.88, 0.51]); 
    Color::fromHsv([
        'h' => 0.58,
        's' => 0.88,
        'v' => 0.51,
    ]);

    Color::fromHsv(208, 0.88, 0.51);


**CMYK**

Integers, floats, indexed or associative array of integers/floats:

    Color::fromCmyk(88, 41, 0, 49);
    Color::fromCmyk([88, 41, 0, 49]); 
    Color::fromCmyk([
        'c' => 88,
        'm' => 41,
        'y' => 0,
        'k' => 49,
    ]);

    Color::fromCmyk(0.88, 0.41, 0, 0.49);
    Color::fromCmyk([0.88, 0.41, 0, 0.49]); 
    Color::fromCmyk([
        'c' => 0.88,
        'm' => 0.41,
        'y' => 0,
        'k' => 0.49,
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

