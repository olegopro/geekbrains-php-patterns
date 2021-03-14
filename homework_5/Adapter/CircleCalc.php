<?php

namespace Adapter;

class CircleCalc implements ICircle
{
    function circleArea(int $circumference = 0)
    {
        $radius = $circumference / (pi() * 2); //ЧЕРЕЗ РАДИУС

        return 'Через длинну окр. - ' . round(pi() * $radius ** 2, 3);
    }
}
