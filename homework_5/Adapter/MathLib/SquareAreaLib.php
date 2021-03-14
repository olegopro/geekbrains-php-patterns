<?php

namespace Adapter\MathLib;

class SquareAreaLib
{
    public function getSquareArea(int $diagonal)
    {
        return ($diagonal ** 2) / 2;
    }
}
