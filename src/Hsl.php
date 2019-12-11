<?php

namespace Bond211\Colors;

class Hsl
{
    public $h;
    public $s;
    public $l;

    public function __construct(array $hsl)
    {
        [$this->h, $this->s, $this->l] = $hsl;
    }

    public function __toString()
    {
        return round($this->h) . '°, ' . $this->s . '%, ' . $this->l . '%';
    }
}
