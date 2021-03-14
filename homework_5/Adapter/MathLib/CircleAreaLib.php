<?php

namespace Adapter\MathLib;

class CircleAreaLib
{
    public function getCircleArea($diagonal)
    {
        return 'Через диаметр - ' . round((M_PI * $diagonal ** 2) / 4, 3);
    }
}
