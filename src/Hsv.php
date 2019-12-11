<?php

namespace Bond211\Colors;

class Hsv
{
    public $h;
    public $s;
    public $v;

    public function __construct(array $hsv)
    {
        [$this->h, $this->s, $this->v] = $hsv;
    }

    public function __toString()
    {
        return round($this->h) . '°, ' . $this->s . '%, ' . $this->v . '%';
    }
}
