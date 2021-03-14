<?php

namespace Fruits;

class BananaFruit implements IFruit
{
    public function getFruit(): void
    {
        echo 'Это банан';
    }
}
