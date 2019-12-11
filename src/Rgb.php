<?php

namespace Bond211\Colors;

class Rgb
{
    public $r;
    public $b;
    public $g;

    public function __construct(array $rgb)
    {
        [$this->r, $this->g, $this->b] = $rgb;
    }

    public function __toString()
    {
        return $this->r . ', ' . $this->g . ', ' . $this->b;
    }
}
