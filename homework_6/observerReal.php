<?php

use ObserverReal\Logger;
use ObserverReal\OnboardingNotification;
use ObserverReal\UserRepository;



$userRepository = new UserRepository();

//запись всех событый в файл
$userRepository->attach(new Logger(__DIR__ . '/log.txt'), '*');

//наблюдать за созданием/регистрацией пользователей
$userRepository->attach(new OnboardingNotification('admin@admin.com'), 'users:created');

//наблюдать за изменением пользователей
$onBoardingNotification = new OnBoardingNotification('admin@admin.com');
$userRepository->attach($onBoardingNotification, 'users:updated');

$user = $userRepository->createUser([
    'name' => 'John Smith',
    'email' => 'john99@example.com',
    'experience' => '3 years',
    'subscribeStatus' => TRUE
]);

$user2 = $userRepository->createUser([
    'name' => 'Jo22hn Smith',
    'email' => 'john2323@example.com',
    'experience' => '5 years',
    'subscribeStatus' => TRUE
]);

$allUsers = $userRepository->users[$user->attributes['id']]->attributes['email'];

//var_dump($userRepository->users);

//foreach ($userRepository->users as $user) {
//    echo $userEmail = $user->attributes['email'];
//}

//наблюдать за созданием вакансии
$vacancyRepository = new \ObserverReal\VacancyRepository();
$vacancyRepository->attach($onBoardingNotification, 'vacancies:created');

$userObserver = new \ObserverReal\UserObserver('user@email');
$vacancyRepository->attach($userObserver, 'vacancies:created');

$vacancy = $vacancyRepository->createVacancy([
    'title' => 'PHP Developer',
    'experience' => '3 years'
]);

$vacancy2 = $vacancyRepository->createVacancy([
    'title' => 'React Developer',
    'experience' => '5 years'
]);

$userRepository->updateUser($user, ['subscribeStatus' => FALSE]);

//var_dump($vacancyRepository->observers);


