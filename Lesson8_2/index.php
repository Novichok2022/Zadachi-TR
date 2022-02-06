<?php

include 'Autoloader.php';

$autoLoad = new Autoloader;
$autoLoad->registerAutoload();

$employee = new Employee('Вася', 10, IUser::GENDER_MEAN, -1000);

echo 'Ім\'я співробітника: ' . $employee->getName() . '<br>';
echo 'Вік співробітника: ' . $employee->getAge() . '<br>';
echo 'Cтать співробітника: ' . $employee->getGender() . '<br>';
echo 'Зарплата співробітника: ' . $employee->getSalary() . '<br><br>';


$employee2 = new Employee('Kolja', 35, IUser::GENDER_MEAN, 10025.65);

echo 'Ім\'я співробітника: ' . $employee2->getName() . '<br>';
echo 'Вік співробітника: ' . $employee2->getAge() . '<br>';
echo 'Cтать співробітника: ' . $employee2->getGender() . '<br>';
echo 'Зарплата співробітника: ' . $employee2->getSalary() . '<br><br>';

$employee3 = new Employee('Людмила', 26, IUser::GENDER_WOMAN, 5800);

echo 'Ім\'я співробітника: ' . $employee3->getName() . '<br>';
echo 'Вік співробітника: ' . $employee3->getAge() . '<br>';
echo 'Cтать співробітника: ' . $employee3->getGender() . '<br>';
echo 'Зарплата співробітника: ' . $employee3->getSalary() . '<br><br>';
