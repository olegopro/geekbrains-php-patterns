<?php

use Notifications\ChromeNotification;
use Notifications\NotificationDecoratorWay;
use Notifications\SmsNotification;
use Notifications\EmailNotification;

//var_dump((new NotificationDecoratorWay(new ChromeNotification(), 'sms')));

$textMessage = 'Купи лайков';

(new NotificationDecoratorWay(new ChromeNotification(), $textMessage))->send();
echo '<br>';
(new NotificationDecoratorWay(new SmsNotification(), $textMessage))->send();
echo '<br>';

//(new NotificationDecoratorWay(new EmailNotification(), $textMessage))->send();
$mailWay = new EmailNotification();
$way = new NotificationDecoratorWay($mailWay, $textMessage);
$way->send();

