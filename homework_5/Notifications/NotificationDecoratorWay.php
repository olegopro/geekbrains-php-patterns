<?php

namespace Notifications;

class NotificationDecoratorWay extends NotificationsDecorator
{
    public string $textNotification;

    public function __construct(INotifications $decoratedNotification, string $textNotification)
    {
        $this->wayNotification = $textNotification;
        parent::__construct($decoratedNotification);
    }

    public function sendType(): string
    {
        return $this->wayNotification;
    }

    public function send()
    {
        $type = $this->decoratedNotification->send();
        $way = $this->sendType();

        echo $type . ' - ' . $way;
    }
}
