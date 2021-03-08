<?php

namespace Notifications;

class EmailNotification implements INotifications
{
    public function send()
    {
        echo ' Медот отправки сообщения через email (smtp/imap) ';
    }
}
