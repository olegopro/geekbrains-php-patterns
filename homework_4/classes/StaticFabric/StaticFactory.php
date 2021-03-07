<?php

namespace StaticFabric;

class StaticFactory
{
    public static function create(string $type): IFactory
    {
        //return new $type();
        if ($type == 'save') {
            return new FactoryClass();
        }
    }
}
