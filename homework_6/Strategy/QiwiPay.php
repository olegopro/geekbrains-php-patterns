<?php

namespace Strategy;

class QiwiPay extends PaymentMethod
{
    public function pay()
    {
        echo 'оплата через api QiwiPay';
    }
}
