<?php

use Adapter\CircleAdapter;
use Adapter\CircleCalc;
use Adapter\ICircle;
use Adapter\MathLib\CircleAreaLib;

function clientCode(ICircle $area)
{
    echo $area->circleArea(10);
}

$circleCalc = new CircleCalc();
clientCode($circleCalc);

echo '<br>';

$circleAreaLib = new CircleAreaLib();
$circleAdapter = new CircleAdapter($circleAreaLib);
clientCode($circleAdapter);

