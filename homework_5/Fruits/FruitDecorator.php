<?php

namespace Fruits;

abstract class FruitDecorator implements IFruit
{
    protected IFruit $decoratedFruit;

    public function __construct(IFruit $decoratedFruit)
    {
        $this->decoratedFruit = $decoratedFruit;
    }

    public function getFruit(): void
    {
        $this->decoratedFruit->getFruit();
    }
}
