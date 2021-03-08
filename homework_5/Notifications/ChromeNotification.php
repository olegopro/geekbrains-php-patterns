<?php

namespace Notifications;

class ChromeNotification implements INotifications
{
    public function send()
    {
        echo ' Медот отправки сообщения в (chrome)';
    }
}
