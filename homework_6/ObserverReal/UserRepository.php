<?php

namespace ObserverReal;

use SplObserver;

class UserRepository implements \SplSubject
{
    public array $users = [];
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

        $this->notify('user:detach');
    }

    public function notify(string $event = '*', $data = NULL): void
    {
        echo "Репозиторий пользователей: трансляция события '$event'.<br>";
        foreach ($this->getEventObservers($event) as $observer) {
            $observer->update($this, $event, $data);
        }
    }

    public function createUser(array $data): User
    {
        echo "Репозиторий пользователей: Создание пользователя<br>";

        $user = new User();
        $user->update($data);

        $id = bin2hex(openssl_random_pseudo_bytes(16));
        $user->update(['id' => $id]);
        $this->users[$id] = $user;
        $this->notify('users:created', $user);

        return $user;
    }

    public function updateUser(User $user, array $data): ?User
    {
        echo "Репозиторий пользователей: Обновление пользователя<br>";

        $id = $user->attributes['id'];
        if (!isset($this->users[$id])) {
            return NULL;
        }

        $user = $this->users[$id];
        $user->update($data);

        $this->notify('users:updated', $user);

        return $user;
    }

    public function deleteUser(User $user): void
    {
        echo "Репозиторий пользователей: Удаление пользователя<br>";
        $id = $user->attributes['id'];
        if (!isset($this->users[$id])) {
            return;
        }

        unset($this->users[$id]);
    }
}
