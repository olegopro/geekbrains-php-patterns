<?php

namespace Adapter;

use Adapter\MathLib\CircleAreaLib;

class CircleAdapter implements ICircle
{
    private CircleAreaLib $circle;

    public function __construct(CircleAreaLib $circle)
    {
        $this->circle = $circle;
    }

    function circleArea($circumference = 0)
    {
        return $this->circle->getCircleArea($circumference);
    }
}
