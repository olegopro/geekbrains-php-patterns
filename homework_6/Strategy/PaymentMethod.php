<?php

namespace Strategy;

abstract class PaymentMethod implements IPaymentMethod
{
    protected string $merchantAPI;

    public function __construct(string $merchantAPI)
    {
        $this->merchantAPI = $merchantAPI;
    }

    public function pay()
    {
    }
}
