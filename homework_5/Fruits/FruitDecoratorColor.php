<?php

namespace Fruits;

class FruitDecoratorColor extends FruitDecorator
{
    public string $colorFruit;

    public function __construct(IFruit $decoratedFruit, string $colorFruit)
    {
        $this->colorFruit = $colorFruit;
        parent::__construct($decoratedFruit);
    }

    private function fruitColor(): string
    {
        return $this->colorFruit;
    }

    public function getFruit(): void
    {
        $fruit = $this->decoratedFruit->getFruit();
        $color = $this->fruitColor();

        echo $fruit . ' - ' . $color;
    }
}
