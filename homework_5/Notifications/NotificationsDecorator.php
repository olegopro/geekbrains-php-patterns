<?php

namespace Notifications;

abstract class NotificationsDecorator implements INotifications
{
    protected INotifications $decoratedNotification;

    public function __construct(INotifications $decoratedNotification)
    {
        $this->decoratedNotification = $decoratedNotification;
    }

    private function getNotification()
    {
        $this->decoratedNotification->getNotification();
    }
}
