<?php

namespace BondarDe\Colors;

class Cmyk
{
    public $c;
    public $m;
    public $y;
    public $k;

    public function __construct(array $cmyk)
    {
        [$this->c, $this->m, $this->y, $this->k] = $cmyk;
    }

    public function __toString()
    {
        return ''
            . $this->c . '%, '
            . $this->m . '%, '
            . $this->y . '%, '
            . $this->k . '%';
    }
}
