<?php

use Strategy\IPaymentMethod;
use Strategy\QiwiPay;
use Strategy\WebMoneyPay;
use Strategy\BaseLogic;

/*$obj = new BaseLogic(new WebMoneyPay('webmoney...'));
$obj->execute();

echo '<br>';

$obj = new BaseLogic(new QiwiPay('qiwiApi...'));
$obj->execute();*/

function saveStrategy($PaymentCollection)
{
    foreach ($PaymentCollection as $payMethod) {
        if ($payMethod instanceof IPaymentMethod) {
            $payMethod->pay();
        }
    }

    return TRUE;
}

saveStrategy([
    new WebMoneyPay('webmoney...'),
    new QiwiPay('qiwiApi...')
]);

