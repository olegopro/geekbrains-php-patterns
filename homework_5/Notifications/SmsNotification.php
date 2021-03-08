<?php

namespace Notifications;

class SmsNotification implements INotifications
{
    public function send()
    {
        echo ' Выбор шлюза и отправка смс сообщения ';
    }
}
