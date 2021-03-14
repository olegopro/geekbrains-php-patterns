<?php

namespace ObserverReal;

use SplObserver;

class VacancyRepository implements \SplSubject
{
    public array $vacancies = [];
    public array $observers = [];

    public function __construct()
    {
        $this->observers['*'] = [];
    }

    private function initEventGroup(string $event = '*'): void
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
    }

    private function getEventObservers(string $event = '*'): array
    {
        $this->initEventGroup($event);
        $group = $this->observers[$event];
        $all = $this->observers['*'];

        return array_merge($group, $all);
    }

    public function attach(SplObserver $observer, string $event = '*'): void
    {
        $this->initEventGroup($event);
        $this->observers[$event][] = $observer;
    }

    public function detach(SplObserver $observer, string $event = '*')
    {
        foreach ($this->getEventObservers($event) as $key => $s) {
            if ($s === $observer) {
                unset($this->observers[$event][$key]);
            }
        }

        $this->notify('vacancies:detach');
    }

    public function notify(string $event = '*', $data = NULL): void
    {
        echo "Репозиторий вакансий: трансляция события '$event'.<br>";
        foreach ($this->getEventObservers($event) as $observer) {
            $observer->update($this, $event, $data);
        }
    }

    public function createVacancy(array $data): Vacancy
    {
        echo "Репозиторий вакансий: Создание вакансии<br>";

        $vacancy = new Vacancy();
        $vacancy->update($data);

        $id = bin2hex(openssl_random_pseudo_bytes(16));
        $vacancy->update(['id' => $id]);
        $this->vacancies[$id] = $vacancy;
        $this->notify('vacancies:created', $vacancy);

        return $vacancy;
    }

    public function updateVacancy(Vacancy $vacancy, array $data): ?Vacancy
    {
        echo "Репозиторий вакансий: Обновление вакансии<br>";

        $id = $vacancy->attributes['id'];
        if (!isset($this->vacancies[$id])) {
            return NULL;
        }

        $vacancy = $this->vacancies[$id];
        $vacancy->update($data);

        $this->notify('vacancies:updated', $vacancy);

        return $vacancy;
    }

    public function deleteVacancy(Vacancy $vacancy): void
    {
        echo "Репозиторий вакансий: Удаление вакансии<br>";
        $id = $vacancy->attributes['id'];
        if (!isset($this->vacancies[$id])) {
            return;
        }

        unset($this->vacancies[$id]);
    }
}
