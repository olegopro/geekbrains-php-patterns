<?php

use Fruits\FruitDecoratorColor;
use Fruits\AppleFruit;
use Fruits\BananaFruit;
use Fruits\PearFruit;

(new FruitDecoratorColor(new AppleFruit(), 'зеленое'))->getFruit();
echo '<br>';
(new FruitDecoratorColor(new BananaFruit(), 'желтый'))->getFruit();
