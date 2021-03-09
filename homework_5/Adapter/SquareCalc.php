<?php

namespace Adapter;

class SquareCalc implements ISquare
{
    function squareArea(int $sideSquare): int
    {
        return $sideSquare ** 2;
    }
}
