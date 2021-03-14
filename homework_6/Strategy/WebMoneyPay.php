<?php

namespace Strategy;

class WebMoneyPay extends PaymentMethod
{
    public function pay()
    {
        echo 'оплата через api WebMoney';
    }
}
