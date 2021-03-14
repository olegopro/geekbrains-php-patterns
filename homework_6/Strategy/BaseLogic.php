<?php

namespace Strategy;

class BaseLogic
{
    private $payment;

    public function __construct(IPaymentMethod $payment)
    {
        $this->payment = $payment;
    }

    public function execute(): bool
    {
        $this->payment->pay();
        return true;
    }
}
