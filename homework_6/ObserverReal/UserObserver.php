<?php

namespace ObserverReal;

use SplSubject;

class UserObserver implements \SplObserver
{
    private string $userEmail;

    public function __construct(string $userEmail)
    {
        $this->userEmail = $userEmail;
    }

    public function update(SplSubject $subject, string $event = NULL, mixed $data = NULL)
    {
        //var_dump($this->userEmail);
        switch ($event) {
            case 'vacancies:created':
                echo "Рассылка: Информация о <b>новой вакансии</b> отправлена на  $this->userEmail<br>";
                break;

            case 'vacancies:updated':
                echo "Рассылка: Информация о <b>вакансии обновленна</b> и отправленна на  $this->userEmail<br>";
                break;

            case 'vacancies:detach':
                echo "Рассылка: Вакансия <b>удаленна</b> информация отправленна на  $this->userEmail<br>";
                break;
        }
    }
}
