<?php

namespace Fruits;

class AppleFruit implements IFruit
{
    public function getFruit(): void
    {
        echo 'Это яблоко';
    }
}
