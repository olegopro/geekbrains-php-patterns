<?php

namespace ObserverReal;

use SplSubject;

class OnBoardingNotification implements \SplObserver
{
    private string $adminEmail;

    public function __construct(string $adminEmail)
    {
        $this->adminEmail = $adminEmail;
    }

    public function update(SplSubject $subject, string $event = NULL, mixed $data = NULL): void
    {
        //var_dump($event);
        switch ($event) {
            case 'users:created':
                echo "Рассылка: Информация о <b>регистрации</b> отправлена на {$data->attributes['email']} <br>";
                break;

            case 'users:updated':
                echo "Рассылка: Информация о <b>статусе</b> подписки отправленна на {$data->attributes['email']} <br>";
                break;
        }
    }
}
